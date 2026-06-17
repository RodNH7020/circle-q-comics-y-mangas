
<@extends('layouts.app')

@section('title', 'Mi Perfil')

@section('content')

<div class="container my-5">
    
    <div class="card shadow-sm border-0 p-4 p-md-5 fondo-texto">
        
        <h2 class="mb-4 fw-bold">Mi Perfil</h2>

       <h4 class="mb-3 border-bottom pb-2">Datos Personales</h4>
         <div class="row mb-4">
           <div class="col-12 col-md-6"><p><strong>Nombre:</strong> {{ $usuario->nombre }}</p></div>
           <div class="col-12 col-md-6"><p><strong>Apellido:</strong> {{ $usuario->apellido }}</p></div>
           <div class="col-12 col-md-6"><p><strong>Email:</strong> {{ $usuario->email }}</p></div>
          <div class="col-12 col-md-6"><p><strong>Teléfono:</strong> {{ $usuario->telefono }}</p></div>
       </div>

        <h4 class="mb-3 border-bottom pb-2">Dirección de Envío</h4>
        <div class="row mb-4">
            <div class="col-12 col-md-6"><p><strong>Dirección:</strong> {{ $usuario->direccion }}</p></div>
            <div class="col-12 col-md-6"><p><strong>Ciudad:</strong> {{ $usuario->ciudad }}</p></div>
            <div class="col-12 col-md-6"><p><strong>Provincia:</strong> {{ $usuario->provincia }}</p></div>
            <div class="col-12 col-md-6"><p><strong>C.P.:</strong> {{ $usuario->codigopostal }}</p></div>
        </div>

        <div class="mt-4 d-flex flex-wrap gap-2 justify-content-center">

    <a href="{{ route('perfil.editar') }}"
       class="btn btn-danger px-4">
        Editar datos
    </a>

    <a href="{{ route('perfil.mis-compras') }}"
       class="btn btn-danger px-4">
        Ver mis compras
    </a>

    <a href="{{ route('perfil.consultas') }}"
       class="btn btn-danger px-4">
        Mis consultas
    </a>

</div>
    </div>
</div>

@endsection