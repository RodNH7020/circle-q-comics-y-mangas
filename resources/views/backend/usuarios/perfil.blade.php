@extends('layouts.app')

@section('content')
<div class="container mt-5">
    <h2 class="text-white mb-4">Mi Perfil</h2>

    <div class="card p-4">
        <h4 class="text-white mb-3">Datos Personales</h4>
        <div class="row mb-3">
            <div class="col-md-6"><p><strong>Nombre:</strong> {{ $usuario->nombre }}</p></div>
            <div class="col-md-6"><p><strong>Apellido:</strong> {{ $usuario->apellido }}</p></div>
            <div class="col-md-12"><p><strong>Email:</strong> {{ $usuario->email }}</p></div>
        </div>

        <hr class="text-white">

        <h4 class="text-white mb-3">Dirección de Envío</h4>
        <div class="row">
            <div class="col-md-6"><p><strong>Dirección:</strong> {{ $usuario->direccion }}</p></div>
            <div class="col-md-6"><p><strong>Ciudad:</strong> {{ $usuario->ciudad }}</p></div>
            <div class="col-md-6"><p><strong>Provincia:</strong> {{ $usuario->provincia }}</p></div>
            <div class="col-md-6"><p><strong>C.P.:</strong> {{ $usuario->codigopostal }}</p></div>
        </div>

        <div class="mt-4 text-center">
            <a href="{{ url('/') }}" class="btn btn-primary">Volver al inicio</a>
            <a href="{{ route('perfil.editar') }}" class="btn btn-warning">Editar datos</a>
        </div>
    </div>
</div>
<div class="card mt-4 shadow-sm">
    <div class="card-header bg-dark text-white">
        <h4 class="mb-0">Mis Compras Realizadas</h4>
    </div>
    <div class="card-body">
        
        {{-- Si el usuario no compró nada todavía --}}
        @if($compras->isEmpty())
            <div class="alert alert-info mb-0">
                Todavía no realizaste ninguna compra. <a href="{{ route('catalogo') }}">¡Mirá nuestro catálogo!</a>
            </div>
        @else
            {{-- Tabla con el historial de pedidos --}}
            <div class="table-responsive">
                <table class="table table-hover align-middle mb-0">
                   <thead class="table-light">
                        <tr>
                            <th>Nro. Pedido</th>
                            <th>Fecha y Hora</th>
                            <th class="text-end">Total Abonado</th>
                            <th class="text-center">Estado</th>
                            <th class="text-center">Acciones</th> {{-- Faltaba sumar el título de esta columna --}}
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($compras as $compra)
                            <tr>
                                <td><strong>#{{ $compra->id }}</strong></td>
                                <td>{{ \Carbon\Carbon::parse($compra->fecha_venta)->format('d/m/Y H:i') }} hs</td>
                                <td class="text-end fw-bold text-success">
                                    ${{ number_format($compra->total, 2, ',', '.') }}
                                </td>
                                <td class="text-center">
                                    <span class="badge bg-success">Procesado con éxito</span> {{-- Mantenemos el cartelito --}}
                                </td>
                                <td class="text-center">
                                    <a href="{{ route('perfil.factura', $compra->id) }}" class="btn btn-sm btn-info text-white">Ver Detalle</a>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                    </table>
            </div>
        @endif
    </div>
</div>
@endsection