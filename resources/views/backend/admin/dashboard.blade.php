@extends('layouts.app')

@section('content')

<div class = "comtainer mt-5">
    <h1> Panel de Administracion </h>
    <p> Has iniciado sesion correctamente </p>

    <p> Administrador: {{Auth::user()-> nombre }} </p>
</div>
@endsection