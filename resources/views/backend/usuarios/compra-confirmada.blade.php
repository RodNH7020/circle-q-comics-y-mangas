@extends('layouts.app')

@section('title', 'Compra Exitosa')

@section('content')
<div class="container my-5">
    <div class="row justify-content-center">
        <div class="col-12 col-lg-8">

            <!-- LA TARJETA ENVOLVENTE (AHORA CONTIENE TODO) -->
            <div class="card shadow-lg border-0 fondo-texto p-4 p-md-5" id="comprobante-imprimir">
                
                <!-- Mensaje principal de éxito (Se oculta al imprimir) -->
                <div class="text-center mb-5 d-print-none">
                    <div class="text-success mb-3">
                        <svg xmlns="http://www.w3.org/2000/svg" width="80" height="80" fill="currentColor" class="bi bi-check-circle-fill shadow-sm rounded-circle" viewBox="0 0 16 16">
                            <path d="M16 8A8 8 0 1 1 0 8a8 8 0 0 1 16 0m-3.97-3.03a.75.75 0 0 0-1.08.022L7.477 9.417 5.384 7.323a.75.75 0 0 0-1.06 1.06L6.97 11.03a.75.75 0 0 0 1.079-.02l3.992-4.99a.75.75 0 0 0-.01-1.05z"/>
                        </svg>
                    </div>
                    <h2 class="text-white fw-bold">¡Gracias por tu compra!</h2>
                    <p class="text-white-50 fs-5">Tu pedido en <strong>Circle Q</strong> ha sido procesado con éxito.</p>
                </div>

                <!-- Tarjeta interna del Recibo / Comprobante -->
                <div class="card bg-transparent border border-secondary mb-5">
                    
                    <!-- Encabezado del comprobante -->
                    <div class="card-header bg-dark border-bottom border-secondary p-4">
                        <div class="d-flex justify-content-between align-items-center flex-wrap gap-3">
                            <div>
                                <h3 class="text-white fw-bold mb-0">COMPROBANTE</h3>
                                <span class="text-muted small">Circle Q - Cómics & Mangas</span>
                            </div>
                            <div class="text-end">
                                <span class="badge bg-success fs-6 py-2 px-3">Pago Aprobado</span>
                            </div>
                        </div>
                    </div>

                    <!-- Cuerpo del comprobante -->
                    <div class="card-body p-4 p-md-5">
                        
                        <!-- Datos del Comprador y Fecha -->
                        <div class="row mb-5 g-4">
                            <div class="col-sm-6">
                                <h6 class="text-white text-uppercase border-bottom border-secondary pb-2 mb-3">Datos del Comprador</h6>
                                <p class="text-white mb-1"><strong>Nombre:</strong> {{ auth()->user()->nombre }} {{ auth()->user()->apellido }}</p>
                                <p class="text-white mb-1"><strong>Email:</strong> {{ auth()->user()->email }}</p>
                                @if(auth()->user()->direccion)
                                    <p class="text-white mb-1"><strong>Dirección:</strong> {{ auth()->user()->direccion }}</p>
                                @endif
                            </div>
                            
                            <div class="col-sm-6 text-sm-end">
                                <h6 class="text-white text-uppercase border-bottom border-secondary pb-2 mb-3">Detalles de Emisión</h6>
                                <p class="text-white mb-1"><strong>Fecha:</strong> {{ now()->format('d/m/Y') }}</p>
                                <p class="text-white mb-1"><strong>Hora:</strong> {{ now()->format('H:i') }} hs</p>
                            </div>
                        </div>

                        <!-- Tabla de Productos -->
                        <h6 class="text-white text-uppercase mb-3">Resumen de Artículos</h6>
                        <div class="table-responsive mb-4">
                            <table class="table text-white border-secondary mb-0">
                                <thead class="table-dark">
                                    <tr>
                                        <th class="bg-transparent border-secondary pb-3">Producto</th>
                                        <th class="text-center bg-transparent border-secondary pb-3">Cant.</th>
                                        <th class="text-end bg-transparent border-secondary pb-3">Subtotal</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @if(session('items'))
                                        @foreach(session('items') as $item)
                                        <tr>
                                            <td class="bg-transparent text-white border-secondary py-3">
                                                <strong>{{ $item['producto']['nombre'] }}</strong>
                                            </td>
                                            <td class="text-center bg-transparent text-white border-secondary py-3">
                                                {{ $item['cantidad'] }}
                                            </td>
                                            <td class="text-end bg-transparent text-white border-secondary py-3 fw-bold">
                                                ${{ number_format($item['subtotal'], 2, ',', '.') }}
                                            </td>
                                        </tr>
                                        @endforeach
                                    @endif
                                </tbody>
                            </table>
                        </div>

                        <!-- Total Abonado -->
                        <div class="row justify-content-end mt-4">
                            <div class="col-12 col-md-6 col-lg-5">
                                <div class="bg-dark p-3 rounded border border-secondary d-flex justify-content-between align-items-center">
                                    <span class="h5 mb-0 text-white text-uppercase">Total:</span>
                                    <span class="h3 mb-0 text-success fw-bold">${{ number_format(session('total'), 2, ',', '.') }}</span>
                                </div>
                            </div>
                        </div>

                    </div>
                </div> <!-- Fin de tarjeta interna del comprobante -->

                <!-- Botones de navegación final (Ahora adentro de la tarjeta principal) -->
               <div class="d-flex flex-column flex-sm-row justify-content-center gap-3 d-print-none">
    
    <button onclick="window.print()" class="btn btn-danger btn-lg px-4 text-uppercase font-monospace">
        <i class="bi bi-printer"></i> Imprimir factura
    </button>
    
    <a href="{{ route('catalogo') }}" class="btn btn-danger btn-lg px-4 text-uppercase font-monospace">
        Seguir comprando
    </a>

</div>

            </div> <!-- FIN DE LA TARJETA ENVOLVENTE -->

        </div>
    </div>
</div>

<!-- Estilo extra para la impresión -->
<style>
    @media print {
        /* Fuerza fondo blanco y texto negro para no gastar tinta */
        body, html { background-color: white !important; color: black !important; }
        .fondo-texto, .bg-dark, .card, .table-dark { background-color: white !important; color: black !important; }
        .text-white, .text-white-50 { color: black !important; }
        
        /* Oculta la barra de navegación y el pie de página (ajusta las clases según tu layout) */
        nav, footer, .navbar { display: none !important; }
        
        /* Asegura que los bordes de la tabla se vean bien en el papel */
        .border-secondary { border-color: #dee2e6 !important; }
        
        /* Saca las sombras */
        .shadow-lg { box-shadow: none !important; }
    }
</style>
@endsection