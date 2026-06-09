@extends('layouts.app')

@section('content')

<h1>Panel Administrador</h1>

<a href="/admin/productos" class="btn btn-primary">
    Gestionar Productos
</a>

<br>

<a href="/admin/usuarios">
    Ver Usuarios
</a>

<br>

<a href="/admin/contactos">
    Ver Consultas
</a>

<br>

<a href="/admin/ventas">
    Ver Ventas
</a>

@endsection