<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ContactoController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\CarritoController;
use App\Http\Controllers\ProductoController;

// --- RUTAS PÚBLICAS ---
Route::get('/', function () { return view('welcome'); });
Route::get('/home', function () { 
    // 1. Buscamos todas las editoriales
    $editoriales = \App\Models\Producto::select('editorial')
                        ->whereNotNull('editorial')
                        ->where('editorial', '!=', '')
                        ->distinct()
                        ->pluck('editorial');

    // 2. Buscamos TODOS los productos para que la vista pueda filtrarlos
    $productos = \App\Models\Producto::all();

    // 3. Le enviamos AMBAS variables a la vista
    return view('home', compact('editoriales', 'productos')); 
})->name('home');
Route::get('/quienes-somos', function () { return view('quienes-somos'); });
Route::get('/comercializacion', function () { return view('comercializacion'); });
Route::get('/terminos-y-usos', function () { return view('terminos-y-usos'); });
Route::get('/consultas', function () { return view('consultas'); });
Route::get('/sucursal', function () { return view('sucursal'); });
Route::get('/politicas-de-privacidad', function () { return view('politicas-de-privacidad'); });
Route::get('/informacion-de-contacto', function () { return view('informacion-de-contacto'); });
Route::post('/contacto-enviar', [ContactoController::class, 'procesar'])->name('contacto.enviar');

// Login / Registro / Logout
Route::get('/login', [AuthController::class, 'formularioLogin'])->name('login');
Route::post('/login', [AuthController::class, 'autenticar'])->name('login.post');
Route::get('/register', [AuthController::class, 'formularioRegistro'])->name('register');
Route::post('/register', [AuthController::class, 'registrar'])->name('register.post');
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

// Catálogo
Route::get('/catalogo', [ProductoController::class, 'catalogoPublico'])->name('catalogo');

// --- RUTAS DE USUARIO (CLIENTE) ---
Route::middleware(['auth', 'role:user'])->group(function () { 
    Route::get('/carrito', [CarritoController::class, 'index'])->name('cliente.carrito');
    Route::post('/carrito/agregar', [CarritoController::class, 'agregar'])->name('carrito.agregar');
    Route::put('/carrito/actualizar/{id}', [CarritoController::class, 'actualizar'])->name('carrito.actualizar');
    Route::delete('/carrito/eliminar/{id}', [CarritoController::class, 'eliminar'])->name('carrito.eliminar'); 
    Route::post('/carrito/confirmar', [CarritoController::class, 'confirmar'])->name('carrito.confirmar'); 
    Route::get('/compra-confirmada', function () { 
        if (!session('total')) return redirect()->route('home');
        return view('backend.usuarios.compra-confirmada'); 
    })->name('compra.confirmada');
    Route::delete('/carrito/vaciar', [CarritoController::class, 'vaciar'])->name('carrito.vaciar');

    // Perfil del usuario
    Route::get('/perfil', [AuthController::class, 'perfil'])->name('perfil');
    Route::get('/perfil/editar', [AuthController::class, 'formularioEditar'])->name('perfil.editar');
    Route::post('/perfil/actualizar', [AuthController::class, 'actualizar'])->name('perfil.actualizar');
    Route::get('/perfil/compra/{id}', [AuthController::class, 'verFactura'])->name('perfil.factura');
    Route::get('/perfil/mis-compras', [AuthController::class, 'misCompras'])->name('perfil.mis-compras');
});

// --- RUTAS DE ADMINISTRADOR ---
Route::middleware(['auth', 'role:admin'])->group(function() { 
    Route::get('/admin', [AdminController::class, 'dashboard'])->name('admin.dashboard');
    Route::get('/admin/usuarios', [AdminController::class, 'usuarios'])->name('admin.usuarios');
    
    // Ventas Admin
    Route::get('/admin/ventas', [AdminController::class, 'ventas'])->name('admin.ventas');
    Route::get('/admin/ventas/{id}', [AdminController::class, 'detalleVenta'])->name('admin.ventas.show');

    // Gestión Productos Admin
    Route::get('/admin/productos', [ProductoController::class, 'index'])->name('productos.index');
    Route::get('/admin/productos/create', [ProductoController::class, 'create']);
    Route::post('/admin/productos', [ProductoController::class, 'store'])->name('productos.store');
    Route::get('/admin/productos/{id}/edit', [ProductoController::class, 'edit'])->name('productos.edit');
    Route::put('/admin/productos/{id}', [ProductoController::class, 'update'])->name('productos.update');
    Route::delete('/admin/productos/{id}', [ProductoController::class, 'destroy'])->name('productos.destroy');
    Route::put('/admin/productos/{id}/toggle', [ProductoController::class, 'toggleActivo'])->name('productos.toggle');

    // Gestión Consultas Admin
    Route::get('/admin/consultas',[AdminController::class, 'consultas'])->name('admin.consultas');
    Route::put('/admin/consultas/{id}/resolver',[AdminController::class, 'resolverConsulta'])->name('admin.consultas.resolver');
   ;

   //Gestión usuarios admin
  Route::put('/admin/usuarios/{id}/rol',[AdminController::class, 'cambiarRol'])->name('admin.usuarios.rol');

});