@extends('layouts.app')

@section('content')

<div class="container mt-4">

    <h1>Listado de Productos</h1>

    <table class="table table-bordered">

        <thead>
            <tr>
                <th>ID</th>
                <th>Nombre</th>
                <th>Editorial</th>
                <th>Tipo</th>
                <th>Precio</th>
                <th>Stock</th>
                <th>Activo</th>
            </tr>
        </thead>

        <tbody>

        @foreach($productos as $producto)

            <tr>
                <td>{{ $producto->id }}</td>
                <td>{{ $producto->nombre }}</td>
                <td>{{ $producto->editorial }}</td>
                <td>{{ $producto->tipo }}</td>
                <td>${{ $producto->precio }}</td>
                <td>{{ $producto->stock }}</td>

                <td>
                    {{ $producto->activo ? 'Sí' : 'No' }}
                </td>
            </tr>

        @endforeach

        </tbody>

    </table>

</div>

@endsection