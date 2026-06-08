<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class RolAdmin
{
    // Agregamos el parámetro $role aquí
    public function handle(Request $request, Closure $next, $role): Response
    {
        if (!auth()->check()) {
            return redirect('/login');
        }

        // Ahora, en lugar de preguntar si es 'admin', 
        // preguntamos si el rol del usuario coincide con el parámetro $role que viene de la ruta
        if (auth()->user()->role !== $role) {
            abort(403, 'Acceso denegado.');
        }

        return $next($request);
    }
}