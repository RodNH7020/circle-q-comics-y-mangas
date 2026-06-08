@extends('layouts.app')

@section('content')
<div class="container mt-5">
    <h2 class="text-white mb-4">Mi Perfil</h2>

    <div class="card p-4">
        <h4 class="text-white mb-3">Datos Personales</h4>
        <div class="row mb-3">
            <div class="col-md-6"><p><strong>Nombre:</strong> {{ $usuario->nombre }}</p></div>
            <div class="col-md-6"><p><strong>Apellido:</strong> {{ $usuario->apellido }}</p></div>
            <div class="col-md-12"><p><strong>Email:</strong> {{ $usuario->email }}</p></div>
        </div>

        <hr class="text-white">

        <h4 class="text-white mb-3">Dirección de Envío</h4>
        <div class="row">
            <div class="col-md-6"><p><strong>Dirección:</strong> {{ $usuario->direccion }}</p></div>
            <div class="col-md-6"><p><strong>Ciudad:</strong> {{ $usuario->ciudad }}</p></div>
            <div class="col-md-6"><p><strong>Provincia:</strong> {{ $usuario->provincia }}</p></div>
            <div class="col-md-6"><p><strong>C.P.:</strong> {{ $usuario->codigopostal }}</p></div>
        </div>

        <div class="mt-4 text-center">
            <a href="{{ url('/') }}" class="btn btn-primary">Volver al inicio</a>
            <a href="{{ route('perfil.editar') }}" class="btn btn-warning">Editar datos</a>
        </div>
    </div>
</div>
@endsection