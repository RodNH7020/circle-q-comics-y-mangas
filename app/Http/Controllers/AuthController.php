<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Models\VentaCabecera;

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
        // 1. Obtiene al usuario conectado
        $usuario = auth()->user();
        
        // 2. Busca las compras confirmadas de ese usuario
        $compras = \App\Models\VentaCabecera::where('user_id', $usuario->id)
                                ->where('estado', 'confirmado')
                                ->orderBy('fecha_venta', 'desc')
                                ->get();
        
        // 3. Pasamos AMBAS variables a la vista
        return view('backend.usuarios.perfil', compact('usuario', 'compras'));
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

    // 1. Validamos los campos (sin el email, pero con el teléfono)
    $request->validate([
        'nombre' => 'required|string|max:255',
        'apellido' => 'required|string|max:255',
        'telefono' => 'nullable|string|max:20', // Agregamos el teléfono
        'direccion' => 'required|string|max:150',
        'ciudad' => 'required|string|max:150',
        'provincia' => 'required|string|max:150',
        'codigopostal' => 'required|string|max:20',
    ]);

    // 2. Actualizamos incluyendo el teléfono
    $usuario->update($request->only([
        'nombre', 'apellido', 'telefono', 'direccion', 'ciudad', 'provincia', 'codigopostal'
    ]));

    return redirect()->route('perfil')->with('success', 'Tus datos se han actualizado correctamente.');
}
public function verFactura($id)
    {
        // 1. Buscamos la compra específica, asegurándonos de que le pertenezca al usuario logueado
        $compra = \App\Models\VentaCabecera::where('id', $id)
                    ->where('user_id', auth()->id())
                    ->firstOrFail();

        // 2. Traemos los detalles (los cómics que están adentro de esa compra)
        $detalles = $compra->detalles()->with('producto')->get();

        // 3. Mandamos los datos a la vista de la factura
        return view('backend.usuarios.factura', compact('compra', 'detalles'));
    }


}
