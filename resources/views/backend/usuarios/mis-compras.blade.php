@extends('layouts.app')

@section('title', 'Mis Compras')

@section('content')

<div class="container my-5">
    <div class="row justify-content-center">
        <div class="col-12 col-lg-10">

            <div class="mb-3">
                <a href="{{ route('perfil') }}" class="btn btn-danger px-4"
                    <i class="bi bi-arrow-left"></i> Volver a mi Perfil
                </a>
            </div>

            <div class="card shadow-sm border p-4 p-md-5" style="background-color: white;">
                
              <h2 class="fw-bold mb-4" style="color: #030303; text-shadow: none !important;">Mis Compras Realizadas</h2>
                
                @if($compras->isEmpty())
                    <div class="alert alert-light border-0">
                        Todavía no realizaste ninguna compra. <a href="{{ route('catalogo') }}" class="fw-bold text-dark">¡Mirá nuestro catálogo!</a>
                    </div>
                @else
                    <div class="table-responsive">
                        <table class="table align-middle">
                            <thead class="border-bottom border-dark">
                                <tr class="text-uppercase" style="color: #555;">
                                    <th class="py-3">Nro. Pedido</th>
                                    <th class="py-3">Fecha y Hora</th>
                                    <th class="py-3 text-end">Total Abonado</th>
                                    <th class="py-3 text-center">Estado</th>
                                    <th class="py-3 text-center">Detalles</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($compras as $compra)
                                    <tr class="border-bottom">
                                        <td class="py-3"><strong>#{{ $compra->id }}</strong></td>
                                        <td class="py-3">{{ \Carbon\Carbon::parse($compra->fecha_venta)->format('d/m/Y H:i') }} hs</td>
                                        <td class="py-3 text-end fw-bold">${{ number_format($compra->total, 2, ',', '.') }}</td>
                                        <td class="py-3 text-center">
                                            <span class="badge" style="background-color: #28a745;">Exitoso</span>
                                        </td>
                                        <td class="py-3 text-center">
                                            <a href="{{ route('perfil.factura', $compra->id) }}" class="btn btn-sm btn-dark px-3">
                                                Ver Detalle
                                            </a>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                @endif
            </div>

        </div>
    </div>
</div>

@endsection