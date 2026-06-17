@extends('layouts.app')

@section('content')

<div class="container my-5">

<div class="card shadow-lg border-0"
     style="background-color: rgba(0,0,0,0.92); border-radius:15px;">

    <div class="card-header bg-transparent border-0 p-4">

        <div class="d-flex justify-content-between align-items-center">

            <h2 class="fw-bold mb-0"
                style="color:#ff5733;">
                Gestión de Productos
            </h2>

            <a href="/admin/productos/create"
               class="btn"
               style="background-color:#ff5733;color:white;">
                Nuevo Producto
            </a>

        </div>

    </div>

    <div class="card-body text-white">

        <div class="table-responsive">

            <table class="table table-dark table-hover align-middle">

                <thead>

                    <tr>
                        <th>ID</th>
                        <th>Nombre</th>
                        <th>Editorial</th>
                        <th>Tipo</th>
                        <th>Precio</th>
                        <th>Stock</th>
                        <th>Estado</th>
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

                        <td>
                            ${{ number_format($producto->precio,2,',','.') }}
                        </td>

                        <td>{{ $producto->stock }}</td>

                        <td>

                            @if($producto->activo)

                                <span class="badge bg-success">
                                    Activo
                                </span>

                            @else

                                <span class="badge bg-danger">
                                    Inactivo
                                </span>

                            @endif

                        </td>

                        <td>

                            <a href="{{ route('productos.edit', $producto->id) }}"
                               class="btn btn-warning btn-sm">
                                Editar
                            </a>

                            <form action="{{ route('productos.toggle', $producto->id) }}"
                                  method="POST"
                                  class="d-inline">

                                @csrf
                                @method('PUT')

                                @if($producto->activo)

                                    <button type="submit"
                                            class="btn btn-danger btn-sm">
                                        Desactivar
                                    </button>

                                @else

                                    <button type="submit"
                                            class="btn btn-success btn-sm">
                                        Activar
                                    </button>

                                @endif

                            </form>

                        </td>

                    </tr>

                @endforeach

                </tbody>

            </table>

        </div>

    </div>

</div>
```

</div>

@endsection
