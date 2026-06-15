<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Consulta;

class ContactoController extends Controller
{
    public function procesar(Request $request)
    {
        // 1. Validamos los campos
       $request->validate([
        'nombre' => 'required|min:3|regex:/^[a-zA-Z\sáéíóúÁÉÍÓÚñÑ]+$/u',
        'email' => 'required|email',
        'mensaje' => 'required|min:10|max:500',
    ], [
        'nombre.required' => 'Por favor, dinos tu nombre.',
        'nombre.regex' => 'El nombre solo puede contener letras y espacios.',
        'email.required' => 'Necesitamos tu correo para contactarte.',
        'email.email' => 'El formato del correo no es válido.',
        'mensaje.required' => 'No olvides escribir tu mensaje.',
    ]);

       // En tu método procesar, después de validar todo:
            Consulta::create([
                'nombre' => $request->nombre,
                'email' => $request->email,
                'mensaje' => $request->mensaje,
            ]);
                    return back()->with('status', 'enviado');
    }
}