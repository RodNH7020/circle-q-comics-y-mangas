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
    
// Pasamos el Request como argumento para poder capturar los datos del formulario de la vista
    public function catalogoPublico(Request $request)
    {
        // 1. Empezamos la consulta filtrando solo los productos que estén activos
        $query = Producto::where('activo', true);

        // EXTRA: Obtenemos TODAS las editoriales únicas registradas en la base de datos
        // Esto evita que el bucle @foreach de la vista falle por no encontrar la variable
        $editorialesDisponibles = Producto::where('activo', true)
            ->whereNotNull('editorial')
            ->where('editorial', '!=', '')
            ->pluck('editorial')
            ->unique()
            ->sort();

        // 2. BUSCADOR INTELIGENTE: Nombre, Descripción, Editorial o Tipo (Manga/Comic)
        if ($request->has('buscar') && $request->buscar != '') {
            $buscar = $request->buscar;
            
            $query->where(function($q) use ($buscar) {
                $q->where('nombre', 'LIKE', "%$buscar%")
                  ->orWhere('descripcion', 'LIKE', "%$buscar%")
                  ->orWhere('editorial', 'LIKE', "%$buscar%")
                  ->orWhere('tipo', 'LIKE', "%$buscar%");
            });
        }

        // 3. FILTRO POR CATEGORÍA DIRECTO (Desde el select de la vista)
        if ($request->has('categoria') && $request->categoria != '') {
            $query->where('tipo', $request->categoria);
        }
        
        // FILTRO POR EDITORIAL SELECCIONADA EN EL SIDEBAR
        if ($request->has('editorial_filtro') && $request->editorial_filtro != '') {
            $query->where('editorial', $request->editorial_filtro);
        }

        // 4. ORDENAMIENTO DE PRECIOS O ALFABÉTICO
        $orden = $request->get('orden', 'az'); // Si no eligen nada, por defecto es A-Z

        if ($orden == 'precio_asc') {
            $query->orderBy('precio', 'asc');
        } elseif ($orden == 'precio_desc') {
            $query->orderBy('precio', 'desc');
        } else {
            $query->orderBy('nombre', 'asc'); // El orden clásico que ya tenías
        }

        // 5. Ejecutamos la consulta final
        $comics = $query->get();

        return view('catalogo', compact('comics', 'request', 'editorialesDisponibles'));
    }



    public function toggleActivo($id)
    {
        $producto = Producto::findOrFail($id);

        $producto->activo = !$producto->activo;

        $producto->save();

        return redirect('/admin/productos');
    }
}