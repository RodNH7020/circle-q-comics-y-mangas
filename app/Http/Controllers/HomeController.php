<?php

namespace App\Http\Controllers;

use App\Models\Producto;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
        // Traemos las primeras 5 editoriales distintas
        $editoriales = Producto::where('activo', 1)->distinct()->pluck('editorial')->take(5);
        
        // Traemos todos los productos activos
        $productos = Producto::where('activo', 1)->get();

        return view('home', compact('editoriales', 'productos'));
    }
}