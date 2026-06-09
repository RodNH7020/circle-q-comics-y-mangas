@extends('layouts.app')

@section('content')
<div class="container mt-5">
    <h2 class="text-white">Editar mis datos</h2>
    <form action="{{ route('perfil.actualizar') }}" method="POST" class="card p-4 bg-dark">
        @csrf
        
        <div class="mb-3">
            <label class="text-white">Nombre</label>
            <input type="text" name="nombre" class="form-control" value="{{ $usuario->nombre }}" required>
        </div>

        <div class="mb-3">
            <label class="text-white">Apellido</label>
            <input type="text" name="apellido" class="form-control" value="{{ $usuario->apellido }}" required>
        </div>

        <div class="mb-3">
            <label class="text-white">Teléfono</label>
            <input type="text" name="telefono" class="form-control" value="{{ $usuario->telefono }}">
        </div>

        <div class="mb-3">
            <label class="text-white">Provincia</label>
            <input type="text" name="provincia" class="form-control" value="{{ $usuario->provincia }}" required>
        </div>

        <div class="mb-3">
            <label class="text-white">Ciudad</label>
            <input type="text" name="ciudad" class="form-control" value="{{ $usuario->ciudad }}" required>
        </div>

        <div class="mb-3">
            <label class="text-white">Dirección</label>
            <input type="text" name="direccion" class="form-control" value="{{ $usuario->direccion }}" required>
        </div>

        <div class="mb-3">
            <label class="text-white">Código Postal</label>
            <input type="text" name="codigopostal" class="form-control" value="{{ $usuario->codigopostal }}" required>
        </div>

        <div class="mt-4">
            <button type="submit" class="btn btn-success">Guardar cambios</button>
            <a href="{{ route('perfil') }}" class="btn btn-secondary">Cancelar</a>
        </div>
    </form>
</div>
@endsection