@extends('layouts.app')

@section('content')

<div class="container mt-4">

    <h1>Usuarios Registrados</h1>

    <table class= "table table-bordered">
        <thead>
            <tr>
                <th>ID</th>
                <th>Nombre</th>
                <th>Apellido</th>
                <th>Email</th>
                <th>Provincia</th>
                <th>Ciudad</th>
                <th>Rol</th>
            </tr>
        </thead>

         <tbody>
        @foreach($usuarios as $usuario)
            <tr>
                <td>{{ $usuario->id }}</td>
                <td>{{ $usuario->nombre }}</td>
                <td>{{ $usuario->apellido }}</td>
                <td>{{ $usuario->email }}</td>
                <td>{{ $usuario->provincia }}</td>
                <td>{{ $usuario->ciudad }}</td>
                <td>{{ $usuario->role}}</td>

            </tr>
            @endforeach
</tbody>
</table>

</div>
@endsection


