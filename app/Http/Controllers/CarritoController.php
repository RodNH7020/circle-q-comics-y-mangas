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

        if ($producto->stock < $request->cantidad) {
            return back()->with('error', 'No hay suficiente stock');
        }

        $carrito = $this->obtenerCarrito();
        $item = $carrito->detalles()->where('producto_id', $producto->id)->first();

        if ($item) {
            $item->cantidad += $request->cantidad;
            $item->subtotal  = $item->cantidad * $item->precio_unitario;
            $item->save();
        } else {
            $carrito->detalles()->create([
                'producto_id'     => $producto->id,
                'cantidad'        => $request->cantidad,
                'precio_unitario' => $producto->precio,
                'subtotal'        => $producto->precio * $request->cantidad,
            ]);
        }

        $this->recalcularTotal($carrito);
        return back()->with('success', 'Producto agregado al carrito');
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