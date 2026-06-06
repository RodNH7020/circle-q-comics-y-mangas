<?php

namespace App\Http\Controllers;

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
}