@extends('layouts.app')
@section('title', 'Iniciar Sesión')
@section('content')

<div class="container mt-5">
     <div class="row justify-content-center">
        <div class="col-12 col-md-8 col-lg-6 fondo-texto p-4 rounded shadow">
            <h3 class="mb-4 text-center">
                Iniciar Sesión
            </h3>


    <form action="{{ route('login.post') }}" method="POST">

        @csrf

        <div class="mb-3">
            <label>Email</label>

            <input
                type="email"
                name="email"
                class="form-control"
                required>
        </div>

        <div class="mb-3">
            <label>Contraseña</label>

            <input
                type="password"
                name="password"
                class="form-control"
                required>
        </div>

        <button
            type="submit"
            class="btn btn-primary">
            Ingresar
        </button>

    </form>

    <p class="mt-3">
        ¿No tenés cuenta?
        <a href="{{ route('register') }}">
            Registrate
         </a>
            </p>

        </div>
    </div>
</div>

@endsection