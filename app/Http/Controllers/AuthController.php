<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

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

    public function registrar(Request $request){
    $request->validate([
        'nombre' => 'required|string|max:255',
        'apellido' => 'required|string|max:255',
        'email' => 'required|string|email|max:255|unique:usuarios',
        'password' => 'required|string|min:8|confirmed',
        'provincia' => 'required|string|max:150',
        'ciudad' => 'required|string|max:150',
        'direccion' => 'required|string|max:150',
        'codigopostal' => 'required|string|max:20',
    ]);

    User::create([
        'nombre' => $request->nombre,
        'apellido' => $request->apellido,
        'email' => $request->email,
        'password' => Hash::make($request->password),
        'telefono' => $request->telefono,
        'provincia' => $request->provincia,
        'ciudad' => $request->ciudad,
        'direccion' => $request->direccion,
        'codigopostal' => $request->codigopostal,
        'role' => 'user',
    ]);

    return redirect('/login')
        ->with('success', 'Usuario registrado correctamente');
}

    // Valida que lleguen el email y la password
public function autenticar(Request $request){
    $credenciales = $request->validate([ 
        'email' => 'required|email',
        'password' => 'required' ]);
/*Auth::attempt() busca el usuario en la BD y compara la contraseña*/
// Si coincide → inicia la sesión y devuelve true
// Si no coincide → devuelve false
    if(Auth::attempt($credenciales)){
         $request->session()->regenerate();
    if(Auth::user()->role === 'admin'){
         return redirect('/admin');
    }
    return redirect('/home'); // si no es admin, es cliente 
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

   public function perfil()
   {
    // Obtiene al usuario que está conectado actualmente
    $usuario = auth()->user();
    
    // Retorna la vista pasando el usuario
    return view('backend.usuarios.perfil', compact('usuario'));
   } 

// Muestra el formulario con los datos actuales para poder modificar el cliente los cambios 
public function formularioEditar()
{
    $usuario = auth()->user();
    return view('backend.usuarios.editar', compact('usuario'));
}

// Procesa la actualización
public function actualizar(Request $request)
{
    $usuario = auth()->user();

    // 1. Validamos todos los campos que el usuario puede editar
    $request->validate([
        'nombre' => 'required|string|max:255',
        'apellido' => 'required|string|max:255',
        'email' => 'required|email|unique:usuarios,email,' . $usuario->id,
        'direccion' => 'required|string|max:150',
        'ciudad' => 'required|string|max:150',
        'provincia' => 'required|string|max:150',
        'codigopostal' => 'required|string|max:20',
    ]);

    // 2. Actualizamos solo los campos validados
    $usuario->update($request->only([
        'nombre', 'apellido', 'email', 'direccion', 'ciudad', 'provincia', 'codigopostal'
    ]));

    // 3. Redirigimos al perfil con un mensaje de éxito
    return redirect()->route('perfil')->with('success', 'Tus datos se han actualizado correctamente.');
}



}
