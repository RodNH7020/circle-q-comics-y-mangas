<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use App\Models\VentaCabecera;
use App\Models\Consulta;

class AdminController extends Controller
{
    public function dashboard(){
        return view('backend.admin.dashboard');
    }

    public function usuarios(){
        $usuarios = User::all();
        return view('backend.admin.usuarios.index', compact('usuarios'));
    }

   public function ventas()
    {
        // Corregimos la consulta para que esté bien estructurada
        $ventas = VentaCabecera::with(['usuario', 'detalles.producto'])
            ->where('estado', 'confirmado')
            ->orderBy('fecha_venta', 'desc')
            ->get();

        $totalVentas = $ventas->count();
        $recaudacionTotal = $ventas->sum('total');

        return view('backend.admin.ventas.index', compact('ventas', 'totalVentas', 'recaudacionTotal'));
    }

    public function detalleVenta($id)
    {
        // Este método busca una venta única por su ID
        $venta = \App\Models\VentaCabecera::with(['usuario', 'detalles.producto'])
                    ->findOrFail($id);

        return view('backend.admin.ventas.show', compact('venta'));
    }

    
    
    public function consultas(){
    $consultas = Consulta::orderBy('created_at', 'desc')->get();

    return view(
        'backend.admin.consultas.index',
        compact('consultas')
    );

}
    public function resolverConsulta($id){
    $consulta = Consulta::findOrFail($id);

    $consulta->update([
        'estado' => 'resuelta'
    ]);

    return back();
}
   public function cambiarRol($id)
{
    $usuario = User::findOrFail($id);

    // Evita que el admin logueado se modifique a sí mismo
    if ($usuario->id == auth()->id()) {
        return back()->with(
            'error',
            'No podés modificar tu propio rol.'
        );
    }

    // Si es admin, verificar que no sea el último
    if ($usuario->role == 'admin') {

        $cantidadAdmins = User::where('role', 'admin')->count();

        if ($cantidadAdmins <= 1) {
            return back()->with(
                'error',
                'Debe existir al menos un administrador.'
            );
        }

        $usuario->update([
            'role' => 'user'
        ]);

        return back()->with(
            'success',
            'Administrador degradado a usuario.'
        );
    }

    // Si es usuario normal
    $usuario->update([
        'role' => 'admin'
    ]);

    return back()->with(
        'success',
        'Usuario promovido a administrador.'
    );
}
}

