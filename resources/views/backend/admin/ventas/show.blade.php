@extends('layouts.app')

@section('content')
<div class="container my-5">
    <div class="card shadow-lg border-0" style="background-color: rgba(0,0,0,0.92); border-radius:15px;">
        <div class="card-header text-center border-0 pt-4">
            <h2 class="fw-bold" style="color:#ff5733;">Venta #{{ $venta->id }}</h2>
        </div>

        <div class="card-body text-white">
            @if($venta->detalles->isEmpty())
                <div class="alert alert-warning">
                    <strong>Aviso:</strong> No se encontraron registros en la tabla 'ventas_detalle' para esta venta. 
                    Verifica en tu base de datos que existan filas con <code>venta_id = {{ $venta->id }}</code>.
                </div>
            @endif

            <div class="row mb-4">
                <div class="col-md-6">
                    <p><strong style="color:#ff5733;">Cliente:</strong><br>
                    {{ $venta->usuario->nombre ?? 'N/A' }} {{ $venta->usuario->apellido ?? '' }}</p>
                </div>
                <div class="col-md-6">
                    <p><strong style="color:#ff5733;">Email:</strong><br>
                    {{ $venta->usuario->email ?? 'N/A' }}</p>
                </div>
            </div>

            <h4 class="mb-3" style="color:#ff5733;">Productos Comprados</h4>
            
            <div class="table-responsive">
                <table class="table table-dark table-hover align-middle">
                    <thead>
                        <tr>
                            <th>Producto</th>
                            <th>Cantidad</th>
                            <th>Precio Unitario</th>
                            <th>Subtotal</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($venta->detalles as $detalle)
                        <tr>
                            <td>{{ $detalle->producto->nombre ?? 'Producto Eliminado' }}</td>
                            <td>{{ $detalle->cantidad }}</td>
                            <td>${{ number_format($detalle->precio_unitario, 2, ',', '.') }}</td>
                            <td>${{ number_format($detalle->subtotal, 2, ',', '.') }}</td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>

            <div class="text-center mt-4">
                <a href="{{ route('admin.ventas') }}" class="btn btn-outline-light">Volver al listado</a>
            </div>
        </div>
    </div>
</div>
@endsection