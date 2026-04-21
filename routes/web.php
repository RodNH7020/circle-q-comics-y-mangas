<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/home', function () {
return view('home');
});

Route::get('/quienes-somos', function () {
return view('quienes-somos');
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