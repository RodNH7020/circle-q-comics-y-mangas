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
Route::middleware(['auth', 'role:admin'])->group(function(){
    Route::get('/admin',[AdminController::class, 'dashboard'])->name('admin.dashboard');
});


Route::get('/cliente', function () {
    return view('backend.usuarios.cliente');
}); // DEJO MIENTRA TANTO PERO HAY QUE BORRAR IGUAL SE PISA 


//rutas del cliente 
Route::middleware(['auth', 'role:cliente'])->group(function () { 
    // Mostrar el carrito 
    Route::get('/carrito', [CarritoController::class, 'index']) 
                          ->name('cliente.carrito'); 
                          
    // Agregar un producto 
    Route::post('/carrito/agregar', [CarritoController::class, 'agregar']) 
                                   ->name('carrito.agregar'); 
                                   
    // Eliminar un producto 
    Route::delete('/carrito/eliminar/{id}', [CarritoController::class, 'eliminar']) 
                                           ->name('carrito.eliminar'); 
                                           
    // Confirmar la compra 
    Route::post('/carrito/confirmar', [CarritoController::class, 'confirmar']) 
                                     ->name('carrito.confirmar'); 
 
    // Vista de compra confirmada (protegida: redirige si no hay sesión) 
    Route::get('/compra-confirmada', function () { 
        if (!session('total')) { 
            return redirect()->route('cliente.dashboard'); 
        } 
        return view('backend.usuarios.compra-confirmada'); 
    })->name('compra.confirmada'); 
    });


    Route::get('/admin/productos/create',
    [ProductoController::class, 'create']
);


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