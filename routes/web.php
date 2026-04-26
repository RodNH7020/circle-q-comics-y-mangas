<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\ContactoController;

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