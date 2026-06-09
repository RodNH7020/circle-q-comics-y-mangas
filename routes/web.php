<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\ContactoController;

use App\Http\Controllers\AuthController;

USE App\Http\Controllers\AdminController;

use App\Http\Controllers\CarritoController;

use App\Http\Controllers\ProductoController;

// Login
Route::get('/login', [AuthController::class, 'formularioLogin'])
    ->name('login');

Route::post('/login', [AuthController::class, 'autenticar'])
    ->name('login.post');

// Registro
Route::get('/register', [AuthController::class, 'formularioRegistro'])
    ->name('register');

Route::post('/register', [AuthController::class, 'registrar'])
    ->name('register.post');

// Logout
Route::post('/logout', [AuthController::class, 'logout'])
    ->name('logout');


Route::get('/', function () {
    return view('welcome');
});

Route::get('/home', function () {
return view('home');
});

Route::get('/quienes-somos', function () {
return view('quienes-somos');
});


Route::get('/comercializacion', function () {
return view('comercializacion');
});


Route::get('/terminos-y-usos', function () {
    return view('terminos-y-usos');
}); 


Route::get('/consultas', function () {
    return view('consultas');
});

Route::get('/sucursal', function () {
    return view('sucursal');
});


Route::get('/politicas-de-privacidad', function () {
    return view('politicas-de-privacidad');
});

//Route::get('/catalogo', function () {
  //  return view('catalogo');
//});
Route::get('/catalogo', [ProductoController::class, 'catalogoPublico'])->name('catalogo');


Route::get('/informacion-de-contacto', function () {
    return view('informacion-de-contacto');
});

Route::post('/contacto-enviar', [ContactoController::class, 'procesar'])->name('contacto.enviar');
//Auth::routes();


//Con doble proteccion
// auth verifica que el usuario este logueado
//rol:admin verifica que sea admin su rol
Route::middleware(['auth', 'role:admin'])->group(function(){
    Route::get('/admin',[AdminController::class, 'dashboard'])->name('admin.dashboard');
});



//rutas del cliente 
// RUTAS PROTEGIDAS PARA EL CLIENTE (USER)
Route::middleware(['auth', 'role:user'])->group(function () { 
    // ... aquí mantienes tus rutas de carrito que ya tenías ...
    Route::get('/carrito', [CarritoController::class, 'index'])->name('cliente.carrito');

    Route::post('/carrito/agregar', [CarritoController::class, 'agregar'])->name('carrito.agregar');

    Route::delete('/carrito/eliminar/{id}', [CarritoController::class, 'eliminar'])->name('carrito.eliminar'); 

    Route::post('/carrito/confirmar', [CarritoController::class, 'confirmar'])->name('carrito.confirmar'); 

    Route::get('/compra-confirmada', function () { 
        if (!session('total')) return redirect()->route('home'); // Asegúrate que esta ruta exista
        return view('backend.usuarios.compra-confirmada'); 
        })->name('compra.confirmada'); 
        });

    Route::get('/admin/productos/create',
    [ProductoController::class, 'create']
     );
    // MANDA A PERFIL 

// Ruta para ver el perfil (la que ya tenías)
Route::get('/perfil', [AuthController::class, 'perfil'])->name('perfil')->middleware('auth');

// RUTAS NUEVAS PARA EDITAR (Agrega estas dos líneas)
Route::get('/perfil/editar', [AuthController::class, 'formularioEditar'])->name('perfil.editar')->middleware('auth');
Route::post('/perfil/actualizar', [AuthController::class, 'actualizar'])->name('perfil.actualizar')->middleware('auth');

Route::get('/admin/productos',
    [ProductoController::class, 'index']
)->name('productos.index');

Route::get(
    '/admin/productos/{id}/edit',
    [ProductoController::class, 'edit']
)->name('productos.edit');

Route::put(
    '/admin/productos/{id}',
    [ProductoController::class, 'update']
)->name('productos.update');

Route::post('/admin/productos',
    [ProductoController::class, 'store']
)->name('productos.store');

Route::delete(
    '/admin/productos/{id}',
    [ProductoController::class, 'destroy']
)->name('productos.destroy');