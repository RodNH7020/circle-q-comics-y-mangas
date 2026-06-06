<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\ContactoController;

use App\Http\Controllers\AuthController;

USE App\Http\Controllers\AdminController;

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

Route::get('/catalogo', function () {
    return view('catalogo');
});

Route::get('/consultas', function () {
    return view('consultas');
});

Route::get('/informacion-de-contacto', function () {
    return view('informacion-de-contacto');
});

Route::post('/contacto-enviar', [ContactoController::class, 'procesar'])->name('contacto.enviar');
//Auth::routes();


//Con doble proteccion
// auth verifica que el usuario este logueado
//rol:admin verifica que sea admin su rol
Route::middleware(['auth', 'role:admin'])->group(function () {
    Route::get('/admin', [AdminController::class, 'dashboard']);
});

Route::middleware(['auth', 'role:admin'])->group(function () {

    Route::get('/admin', [AdminController::class, 'dashboard']);

    Route::get('/admin/productos',
        [ProductoController::class, 'index']);
});


Route::get('/cliente', function () {
    return view('backend.usuarios.cliente');
});

