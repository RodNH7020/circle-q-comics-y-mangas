@extends('layouts.app')

@section('content')
<div class="container mt-5">
    <h2 class="text-white">Editar mis datos</h2>
    <form action="{{ route('perfil.actualizar') }}" method="POST" class="card p-4">
        @csrf
        <div class="mb-3">
            <label class="text-white">Nombre</label>
            <input type="text" name="nombre" class="form-control" value="{{ $usuario->nombre }}" required>
        </div>
        <div class="mb-3">
            <label class="text-white">Dirección</label>
            <input type="text" name="direccion" class="form-control" value="{{ $usuario->direccion }}" required>
        </div>
        <button type="submit" class="btn btn-success">Guardar cambios</button>
        <a href="{{ route('perfil') }}" class="btn btn-secondary">Cancelar</a>
    </form>
</div>
@endsection