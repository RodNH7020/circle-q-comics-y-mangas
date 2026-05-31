<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AuthController extends Controller
{
    public function formularioRegistro()
    {
        return view('backend.usuarios.registro');
    }

    public function formularioLogin()
    {
        return view('backend.usuarios.login');
    }

    public function registrar(Request $request)
    {
        /*Validacion de los datos del formulario*/
        $request->validate([
            'nombre' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:8|confirmed',
        ]);
    }

    // Valida que lleguen el email y la password
public function autenticar(Request $request){
$credenciales = $request->validate([ 'email' => 'required|email',
'password' => 'required' ]);
/*Auth::attempt() busca el usuario en la BD y compara la contraseña*/
// Si coincide → inicia la sesión y devuelve true
// Si no coincide → devuelve false
    if(Auth::attempt($credenciales)){
         $request->session()->regenerate();
    if(Auth::user()->rol === 'admin'){
         return redirect('/admin');
    }
    return redirect('/cliente'); // si no es admin, es cliente 
   }
// Si las credenciales son incorrectas, vuelve al login con error
    return back()->withErrors([ 'email' => 'Email o contraseña incorrectos' ]);
    }



  public function logout(Request $request){
    Auth::logout();
    $request->session()->invalidate();
    $request->session()->regenerateToken();
    return redirect('/login');
   }  
}
