@extends('layouts.app')

@section('content')

<div class="container mt-5">
    <h1>Bienvenido a Circle Q</h1>

    <p>Has iniciado sesión correctamente.</p>

    <p>Usuario: {{ Auth::user()->nombre }}</p>

    <p>Rol: {{ Auth::user()->role }}</p>
</div>

@endsection