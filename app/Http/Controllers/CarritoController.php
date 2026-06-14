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
        
        // 2. Buscamos el producto en el carrito
        $item = $carrito->detalles()->where('id', $id)->first();

        if ($item) {
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
        $carrito = $this->obtenerCarrito();
        
        if ($carrito->detalles()->count() === 0) {
            return back()->with('error', 'Tu carrito está vacío');
        }

        $items = $carrito->detalles()->with('producto')->get();
        $total = $carrito->total;

        $carrito->update([
            'estado'      => 'confirmado',
            'fecha_venta' => now(),
        ]);

        return redirect()->route('compra.confirmada')
                         ->with('items', $items)
                         ->with('total', $total);
    }
}