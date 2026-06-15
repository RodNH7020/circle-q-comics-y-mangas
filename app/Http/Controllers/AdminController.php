<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use App\Models\VentaCabecera;

class AdminController extends Controller
{
    public function dashboard(){
        return view('backend.admin.dashboard');
    }

    public function usuarios(){
        $usuarios = User::all();
        return view('backend.admin.usuarios.index', compact('usuarios'));
    }

    public function ventas(){
    $ventas = VentaCabecera::with([
        'usuario',
        'detalles'
    ])
    ->where('estado', 'confirmado')
    ->orderBy('fecha_venta', 'desc')
    ->get();

    $totalVentas = $ventas->count();

    $recaudacionTotal = $ventas->sum('total');

    return view(
        'backend.admin.ventas.index',
        compact(
            'ventas',
            'totalVentas',
            'recaudacionTotal'
        )
    );
}

    public function detalleVenta($id){
    $venta = VentaCabecera::with([
        'usuario',
        'detalles.producto'
    ])->findOrFail($id);

    return view('backend.admin.ventas.show', compact('venta'));
    }  
}
