<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Producto;

class ProductoController extends Controller
{
    public function index()
    {
        $productos = Producto::all();

        return view(
            'backend.admin.productos.index',
            compact('productos')
        );
    }

    public function create()
    {
        return view('backend.admin.productos.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'nombre' => 'required|max:255',
            'descripcion' => 'required',
            'editorial' => 'required|max:255',
            'tipo' => 'required|max:255',
            'precio' => 'required|numeric|min:0',
            'stock' => 'required|integer|min:0',
            'url_imagen' => 'nullable|max:255',
        ]);

        Producto::create([
            'nombre' => $request->nombre,
            'descripcion' => $request->descripcion,
            'editorial' => $request->editorial,
            'tipo' => $request->tipo,
            'precio' => $request->precio,
            'stock' => $request->stock,
            'url_imagen' => $request->url_imagen,
            'activo' => true,
        ]);

        return redirect('/admin/productos')
            ->with('success', 'Producto creado correctamente');
    }


    public function edit($id)
{
    $producto = Producto::findOrFail($id);

    return view(
        'backend.admin.productos.edit',
        compact('producto')
    );
}

    public function update(Request $request, $id)
    {
        $request->validate([
            'nombre' => 'required|max:255',
            'descripcion' => 'required',
            'editorial' => 'required|max:255',
            'tipo' => 'required|max:255',
            'precio' => 'required|numeric|min:0',
            'stock' => 'required|integer|min:0',
            'url_imagen' => 'nullable|max:255',
        ]);

        $producto = Producto::findOrFail($id);

        $producto->update([
            'nombre' => $request->nombre,
            'descripcion' => $request->descripcion,
            'editorial' => $request->editorial,
            'tipo' => $request->tipo,
            'precio' => $request->precio,
            'stock' => $request->stock,
            'url_imagen' => $request->url_imagen,
        ]);

        return redirect('/admin/productos')
            ->with('success', 'Producto actualizado correctamente');
    }


    public function destroy($id)
    {
        $producto = Producto::findOrFail($id);

        $producto->activo = false;

        $producto->save();

        return redirect('/admin/productos')
            ->with('success', 'Producto desactivado correctamente');
    }
    // ESTA ES LA FUNCIÓN NUEVA QUE FALTABA
    
    public function catalogoPublico()
    {
        // Traemos los productos activos desde la base de datos
        $comics = Producto::where('activo', true)->orderBy('nombre', 'asc')->get();

        // Mandamos los productos a tu vista del catálogo
        return view('catalogo', compact('comics'));
    }
}
