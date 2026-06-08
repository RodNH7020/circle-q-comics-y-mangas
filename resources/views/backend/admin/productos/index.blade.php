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
                <th>Acciones</th>
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

                 <td>
                    <a href="{{ route('productos.edit', $producto->id) }}"
                     class="btn btn-warning btn-sm">
                      Editar
                    </a>
                 </td>
            </tr>

        @endforeach

        </tbody>

    </table>

    <a href="/admin/productos/create"
   class="btn btn-success mb-3">
    Nuevo Producto
    </a>

    <td>

    <a href="{{ route('productos.edit', $producto->id) }}"
       class="btn btn-warning btn-sm">
        Editar
    </a>

    <form action="{{ route('productos.destroy', $producto->id) }}"
          method="POST"
          style="display:inline;">

        @csrf
        @method('DELETE')

        <button
            type="submit"
            class="btn btn-danger btn-sm"
            onclick="return confirm('¿Desea desactivar este producto?')">
            Desactivar
        </button>

    </form>

</td>

</div>



@endsection