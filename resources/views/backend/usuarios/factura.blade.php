@extends('layouts.app')

@section('title', 'Detalle de Factura')

@section('content')
<div class="container my-5">
    <div class="row justify-content-center">
        <div class="col-12 col-lg-8">

            <div class="mb-3">
                <a href="{{ route('perfil') }}" class="btn btn-outline-light btn-sm">
                    <i class="bi bi-arrow-left"></i> Volver a Mi Perfil
                </a>
            </div>

            <div class="card shadow-lg border-0 fondo-texto">
                
                <div class="card-header bg-dark border-bottom border-secondary p-4">
                    <div class="d-flex justify-content-between align-items-center flex-wrap gap-3">
                        <div>
                            <h2 class="text-white fw-bold mb-0">FACTURA</h2>
                            <span class="text-muted small">Circle Q - Cómics & Mangas</span>
                        </div>
                        <div class="text-end">
                            <h4 class="text-white mb-0">Orden #{{ $compra->id }}</h4>
                            <span class="badge bg-success mt-1">Procesada con éxito</span>
                        </div>
                    </div>
                </div>

                <div class="card-body p-4 p-md-5">
                    
                    <div class="row mb-5 g-4">
                        <div class="col-sm-6">
                            <h6 class="text-white text-uppercase border-bottom border-secondary pb-2 mb-3">Datos del Comprador</h6>
                            <p class="text-white mb-1"><strong>Nombre:</strong> {{ $compra->usuario->nombre }} {{ $compra->usuario->apellido }}</p>
                            <p class="text-white mb-1"><strong>Email:</strong> {{ $compra->usuario->email }}</p>
                            @if($compra->usuario->direccion)
                                <p class="text-white mb-1"><strong>Dirección:</strong> {{ $compra->usuario->direccion }}</p>
                            @endif
                        </div>
                        
                        <div class="col-sm-6 text-sm-end">
                            <h6 class="text-white text-uppercase border-bottom border-secondary pb-2 mb-3">Detalles de Emisión</h6>
                            <p class="text-white mb-1"><strong>Fecha:</strong> {{ \Carbon\Carbon::parse($compra->fecha_venta)->format('d/m/Y') }}</p>
                            <p class="text-white mb-1"><strong>Hora:</strong> {{ \Carbon\Carbon::parse($compra->fecha_venta)->format('H:i') }} hs</p>
                        </div>
                    </div>

                    <h6 class="text-white text-uppercase mb-3">Artículos Comprados</h6>
                    <div class="table-responsive mb-4">
                        <table class="table text-white border-secondary mb-0">
                            <thead class="table-dark">
                                <tr>
                                    <th class="bg-transparent border-secondary pb-3">Producto</th>
                                    <th class="text-center bg-transparent border-secondary pb-3">Cant.</th>
                                    <th class="text-end bg-transparent border-secondary pb-3">Precio Unit.</th>
                                    <th class="text-end bg-transparent border-secondary pb-3">Subtotal</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($compra->detalles as $detalle)
                                <tr>
                                    <td class="bg-transparent text-white border-secondary py-3">
                                        <strong>{{ $detalle->producto->nombre }}</strong>
                                    </td>
                                    <td class="text-center bg-transparent text-white border-secondary py-3">
                                        {{ $detalle->cantidad }}
                                    </td>
                                    <td class="text-end bg-transparent text-white border-secondary py-3">
                                        ${{ number_format($detalle->precio_unitario, 2, ',', '.') }}
                                    </td>
                                    <td class="text-end bg-transparent text-white border-secondary py-3 fw-bold">
                                        ${{ number_format($detalle->subtotal, 2, ',', '.') }}
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>

                    <div class="row justify-content-end mt-4">
                        <div class="col-12 col-md-6 col-lg-5">
                            <div class="bg-dark p-3 rounded border border-secondary d-flex justify-content-between align-items-center">
                                <span class="h5 mb-0 text-white text-uppercase">Total:</span>
                                <span class="h3 mb-0 text-success fw-bold">${{ number_format($compra->total, 2, ',', '.') }}</span>
                            </div>
                        </div>
                    </div>

                </div>
                
                <div class="card-footer bg-transparent border-top border-secondary p-4 text-center">
                    <p class="text-muted small mb-0">Gracias por tu compra en Circle Q. Ante cualquier consulta, contáctanos a soporte@circleq.com.</p>
                </div>
            </div>
            
            <div class="text-center mt-4">
                <button onclick="window.print()" class="btn btn-secondary btn-sm text-uppercase font-monospace">
                    <i class="bi bi-printer"></i> Imprimir Comprobante
                </button>
            </div>

        </div>
    </div>
</div>

<style>
    @media print {
        body { background-color: white !important; }
        .fondo-texto, .bg-dark, .card { background-color: white !important; color: black !important; }
        .text-white { color: black !important; }
        .btn, .navbar, footer { display: none !important; }
    }
</style>
@endsection