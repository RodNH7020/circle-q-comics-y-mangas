@extends('layouts.app')

@section('content')
<div class="container my-5">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card shadow-sm border-0">
                
                {{-- Encabezado de la factura --}}
                <div class="card-header bg-dark text-white d-flex justify-content-between align-items-center p-4">
                    <h3 class="mb-0 fw-bold">Circle Q</h3>
                    <div class="text-end">
                        <h5 class="mb-0">Detalle de Compra #{{ $compra->id }}</h5>
                        <small>Fecha: {{ \Carbon\Carbon::parse($compra->fecha_venta)->format('d/m/Y H:i') }} hs</small>
                    </div>
                </div>

                <div class="card-body p-4">
                    <h5 class="mb-4 text-muted border-bottom pb-2">Productos adquiridos</h5>

                    {{-- Tabla de productos comprados --}}
                    <div class="table-responsive">
                        <table class="table table-borderless align-middle mb-0">
                            <thead class="border-bottom">
                                <tr>
                                    <th>Producto</th>
                                    <th class="text-center">Cantidad</th>
                                    <th class="text-end">Precio Unit.</th>
                                    <th class="text-end">Subtotal</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($detalles as $item)
                                <tr>
                                    <td><strong>{{ $item->producto->nombre }}</strong></td>
                                    <td class="text-center">{{ $item->cantidad }}</td>
                                    <td class="text-end">${{ number_format($item->precio_unitario, 2, ',', '.') }}</td>
                                    <td class="text-end">${{ number_format($item->subtotal, 2, ',', '.') }}</td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>

                    <hr class="my-4">

                    {{-- Total final --}}
                    <div class="row justify-content-end">
                        <div class="col-md-5">
                            <div class="d-flex justify-content-between bg-light p-3 rounded">
                                <span class="h5 mb-0">Total Abonado:</span>
                                <span class="h4 mb-0 text-success fw-bold">${{ number_format($compra->total, 2, ',', '.') }}</span>
                            </div>
                        </div>
                    </div>
                    
                </div>

                {{-- Botones de acción --}}
                <div class="card-footer bg-white border-0 text-center p-4 mt-2">
                    <a href="{{ route('perfil') }}" class="btn btn-outline-secondary me-2">Volver a Mi Perfil</a>
                    <button onclick="window.print()" class="btn btn-primary">🖨️ Imprimir Detalle</button>
                </div>

            </div>
        </div>
    </div>
</div>
@endsection