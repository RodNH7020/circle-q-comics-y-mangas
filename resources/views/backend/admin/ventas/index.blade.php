@extends('layouts.app')

@section('content')

<div class="container mt-4 text-white">

    <h1 class="mb-4">VENTAS</h1>

    <div class="row mb-4">

        <div class="col-md-6">
            <div class="card bg-dark border-secondary">
                <div class="card-body">
                    <h5>Total de Ventas</h5>
                    <h2>{{ $totalVentas }}</h2>
                </div>
            </div>
        </div>

        <div class="col-md-6">
            <div class="card bg-success">
                <div class="card-body">
                    <h5>Recaudación Total</h5>
                    <h2>
                        ${{ number_format($recaudacionTotal, 2, ',', '.') }}
                    </h2>
                </div>
            </div>
        </div>

    </div>

    <table class="table table-dark table-striped table-hover">

        <thead>
            <tr>
                <th>ID</th>
                <th>Cliente</th>
                <th>Fecha</th>
                <th>Total</th>
                <th>Estado</th>
                <th>Detalle</th>
            </tr>
        </thead>

        <tbody>

        @foreach($ventas as $venta)

            <tr>

                <td>{{ $venta->id }}</td>

                <td>
                    {{ $venta->usuario->nombre }}
                    {{ $venta->usuario->apellido }}
                </td>

                <td>
                    {{ $venta->fecha_venta }}
                </td>

                <td>
                    ${{ number_format($venta->total, 2, ',', '.') }}
                </td>

                <td>
                    {{ ucfirst($venta->estado) }}
                </td>

                <td>
                    <a href="{{ route('admin.ventas.show', $venta->id) }}"
                       class="btn btn-primary btn-sm">
                        Ver
                    </a>
                </td>

            </tr>

        @endforeach

        </tbody>

    </table>

</div>

@endsection