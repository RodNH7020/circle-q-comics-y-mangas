@extends('layouts.app')

@section('content')

<div class="container mt-5">

    <h2>Crear Cuenta en Circle Q</h2>

    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('register') }}" method="POST">

        @csrf

        <div class="mb-3">
            <label class="form-label">Nombre</label>
            <input
                type="text"
                name="nombre"
                class="form-control"
                required>
        </div>

        <div class="mb-3">
            <label class="form-label">Apellido</label>
            <input
                type="text"
                name="apellido"
                class="form-control"
                required>
        </div>

        <div class="mb-3">
            <label class="form-label">Email</label>
            <input
                type="email"
                name="email"
                class="form-control"
                required>
        </div>

        <div class="mb-3">
            <label class="form-label">Teléfono</label>
            <input
                type="text"
                name="telefono"
                class="form-control">
        </div>

        <div class="mb-3">
            <label class="form-label">Provincia</label>
            <input
                type="text"
                name="provincia"
                class="form-control"
                required>
        </div>

        <div class="mb-3">
            <label class="form-label">Ciudad</label>
            <input
                type="text"
                name="ciudad"
                class="form-control"
                required>
        </div>

        <div class="mb-3">
            <label class="form-label">Dirección</label>
            <input
                type="text"
                name="direccion"
                class="form-control"
                required>
        </div>

        <div class="mb-3">
            <label class="form-label">Código Postal</label>
            <input
                type="text"
                name="codigopostal"
                class="form-control"
                required>
        </div>

        <div class="mb-3">
            <label class="form-label">Contraseña</label>
            <input
                type="password"
                name="password"
                class="form-control"
                required>
        </div>

        <div class="mb-3">
            <label class="form-label">Confirmar Contraseña</label>
            <input
                type="password"
                name="password_confirmation"
                class="form-control"
                required>
        </div>

        <button
            type="submit"
            class="btn btn-success">
            Registrarse
        </button>

    </form>

</div>

@endsection