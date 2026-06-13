@extends('layouts.app')
@section('title', 'Regristo')
@section('content')

<div class="container my-5">
    <div class="row justify-content-center">
        <div class="col-12 col-md-8 col-lg-6 fondo-texto p-4 rounded shadow">

    <h3 class="mb-4 text-center">
    Crear Cuenta </h3>

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
      <div class="form-check mb-3">
    <input
        class="form-check-input"
        type="checkbox"
        name="terminos"
        id="terminos"
        required>

     <label class="form-check-label" for="terminos">
        Acepto los
        <a href="/terminos-y-usos" target="_blank">
            Términos y Condiciones
        </a>
        y la
        <a href="/politicas-de-privacidad" target="_blank">
            Política de Privacidad
        </a>
    </label>
</div>
        <button
    type="submit"
    class="btn btn-success w-100">
    Registrarse
</button>

    </form>

</div>
        </div>
    </div>
</div>
@endsection