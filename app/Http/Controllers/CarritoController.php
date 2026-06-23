<?php

namespace App\Http\Controllers;

use App\Models\VentaCabecera;
use App\Models\VentaDetalle;
use App\Models\Producto;
use Illuminate\Http\Request;

class CarritoController extends Controller
{
    private function obtenerCarrito()
    {
        return VentaCabecera::firstOrCreate(
            [
                'user_id' => auth()->id(),
                'estado'  => 'carrito',
            ],
            ['total' => 0]
        );
    }

    private function recalcularTotal(VentaCabecera $carrito)
    {
        $total = $carrito->detalles()->sum('subtotal');
        $carrito->update(['total' => $total]);
    }

    public function index()
    {
        $carrito = $this->obtenerCarrito();
        $items = $carrito->detalles()->with('producto')->get();
        return view('backend.usuarios.carrito', compact('carrito', 'items'));
    }

 public function agregar(Request $request)
{
    $request->validate([
        'producto_id' => 'required|exists:productos,id',
        'cantidad'    => 'required|integer|min:1',
    ]);

    $producto = Producto::findOrFail($request->producto_id);

    // Bloqueo total si el stock es 0 o menos
    if ($producto->stock <= 0) {
        return back()->with('error', 'Lo sentimos, este producto ya no tiene stock.');
    }

    $carrito = $this->obtenerCarrito();
    
    // Buscar si el producto ya existe en el carrito
    $item = $carrito->detalles()
                     ->where('producto_id', $producto->id)
                     ->first();

    // Cantidad total que quedaría
    $cantidadTotal = $request->cantidad;

    if ($item) {
        $cantidadTotal += $item->cantidad;
    }

    // Verificar stock real
    if ($producto->stock <= 0) {
    return back()->with(
        'error',
        'No hay más stock disponible de este producto'
    );
}

if ($producto->stock < $cantidadTotal) {
    return back()->with(
        'error',
        'Solo quedan ' .
        $producto->stock .
        ' unidades disponibles'
    );
}

    // Si ya existe, sumar cantidad
    if ($item) {

        $item->cantidad += $request->cantidad;

        $item->subtotal =
            $item->cantidad *
            $item->precio_unitario;

        $item->save();

    } else {

        // Si no existe, crear nuevo item
        $carrito->detalles()->create([
            'producto_id'     => $producto->id,
            'cantidad'        => $request->cantidad,
            'precio_unitario' => $producto->precio,
            'subtotal'        => $producto->precio * $request->cantidad,
        ]);
    }

    $this->recalcularTotal($carrito);

    return back()->with(
        'success',
        'Producto agregado al carrito'
    );
}
public function actualizar(Request $request, $id)
{
    // 1. Validamos que nos manden un número válido mayor a 0
    $request->validate([
        'cantidad' => 'required|integer|min:1',
    ]);

    $carrito = $this->obtenerCarrito();
    
    // 2. Buscamos el producto en el carrito (y traemos los datos del producto original)
    $item = $carrito->detalles()->with('producto')->where('id', $id)->first();

    if ($item) {
        $producto = $item->producto;

        // --- VALIDACIÓN DE STOCK (NUEVO) ---
        // Verificamos si la nueva cantidad que pide supera el stock real
        if ($request->cantidad > $producto->stock) {
            return back()->with('error', 'Solo quedan ' . $producto->stock . ' unidades disponibles de este producto.');
        }


        // 3. Actualizamos la cantidad y recalculamos el subtotal de ese producto
        $item->cantidad = $request->cantidad;
        $item->subtotal = $item->precio_unitario * $request->cantidad;
        $item->save();

        // 4. Recalculamos el total general del carrito
        $this->recalcularTotal($carrito);

        return back()->with('success', 'Cantidad actualizada correctamente');
    }

    return back()->with('error', 'No se pudo actualizar el producto');
}


    public function eliminar($id)
    {
        $carrito = $this->obtenerCarrito();
        $carrito->detalles()->where('id', $id)->delete();
        $this->recalcularTotal($carrito);
        return back()->with('success', 'Producto eliminado');
    }

 public function confirmar()
{
    return \DB::transaction(function () {

        $carrito = $this->obtenerCarrito();

        if ($carrito->detalles()->count() === 0) {
            return back()->with(
                'error',
                'Tu carrito está vacío'
            );
        }

        // Validar stock antes de confirmar y ajustar dinámicamente si falta
        foreach ($carrito->detalles as $item) {
            $producto = $item->producto;

       if (!$producto->activo) {
                // Opción recomendada: Eliminamos automáticamente el ítem inactivo para limpiar su carrito
                $item->delete();
                
                // Recalculamos el total del carrito sin este producto inactivo
                $this->recalcularTotal($carrito);

                return redirect()
                    ->route('cliente.carrito')
                    ->with(
                        'error',
                        'El producto "' . $producto->nombre . '" ya no se encuentra disponible en nuestra tienda.'
                    );
            }


            if ($producto->stock < $item->cantidad) {
                
                if ($producto->stock > 0) {
                    // 1. Ajustar la cantidad del ítem al stock máximo que queda disponible
                    $item->cantidad = $producto->stock;
                    
                    // Supongo que tu modelo detalle tiene 'subtotal'. Si no, podés omitir esta línea
                    // o adaptarla según cómo calcules el subtotal de cada fila.
                    $item->subtotal = $item->cantidad * $item->precio_unitario; 
                    $item->save();

                    // 2. Recalcular el total general del carrito sumando todos sus detalles actualizados
                    $nuevoTotal = $carrito->detalles()->sum('subtotal'); // O el campo que uses para el subtotal
                    $carrito->update(['total' => $nuevoTotal]);

                    // 3. Redireccionar informando al usuario el ajuste automático
                    return redirect()
                        ->route('cliente.carrito')
                        ->with(
                            'error',
                            'Solo quedaban ' . $producto->stock . ' unidades de "' . $producto->nombre . '". Actualizamos tu carrito con el máximo disponible para que puedas continuar con la compra.'
                        );
                } else {
                    // CASO EXTREMO: El stock bajó a 0 (completamente agotado)
                    return redirect()
                        ->route('cliente.carrito')
                        ->with(
                            'error',
                            'El producto "' . $producto->nombre . '" se encuentra agotado. Por favor, quítalo de tu carrito para continuar.'
                        );
                }
            }
        }

        // Crear venta definitiva (Si pasa el foreach de arriba, es porque hay stock de todo)
        $ventaReal = VentaCabecera::create([
            'user_id'     => auth()->id(),
            'estado'      => 'confirmado',
            'total'       => $carrito->total,
            'fecha_venta' => now(),
        ]);

        // Migrar detalles y descontar stock
        foreach ($carrito->detalles as $item) {

            $item->update([
                'venta_id' => $ventaReal->id
            ]);

            $producto = $item->producto;
            $producto->stock -= $item->cantidad;
            $producto->save();
        }

        // Vaciar carrito
        $carrito->detalles()->delete();

        $carrito->update([
            'total' => 0
        ]);

        return redirect()
            ->route('cliente.carrito')
            ->with(
                'success',
                '¡Compra realizada con éxito!'
            );
    });
}
public function vaciar()
{
    $carrito = $this->obtenerCarrito();
    
    // Borramos todos los productos
    $carrito->detalles()->delete(); 
    
    // Recalculamos el total
    $this->recalcularTotal($carrito); 
    
    // Usamos EXACTAMENTE el mismo método que usas para eliminar un solo producto
    return back()->with('success', 'El carrito ha sido vaciado por completo.');
}

}