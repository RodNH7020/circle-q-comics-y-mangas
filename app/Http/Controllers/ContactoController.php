<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ContactoController extends Controller
{
    public function procesar(Request $request)
    {
        // 1. Validamos los campos
        $request->validate([
            
             'nombre'  => 'required|min:3|regex:/^[a-zA-Z\sáéíóúÁÉÍÓÚñÑ]+$/u', 
             'email'   => 'required|email',
              'mensaje' => 'required|min:10|max:500',
        ], [
            // Mensajes personalizados en español
            'nombre.required' => 'Por favor, dinos tu nombre.',
            'email.required'  => 'Necesitamos tu correo para contactarte.',
            'email.email'     => 'El formato del correo no es válido.',
            'mensaje.required' => 'No olvides escribir tu mensaje.',
        ]);

       // En tu método procesar, después de validar todo:
return back()->with('status', 'enviado');
    }
}