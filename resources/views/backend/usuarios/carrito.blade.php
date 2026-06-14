@extends('layouts.app')

@section('title', 'Tu Carrito')

@section('content')

<div class="hero text-center text-white mb-4">
    <h1 class="fw-bold">Tu Carrito de Compras</h1>
</div>

<div class="container my-4 my-md-5">
    <div class="card shadow-sm border-0 p-3 p-sm-4 p-md-5 fondo-texto">

        {{-- Mensajes de Éxito o Error --}}
        @if(session('success'))
            <div class="alert alert-success border-0 shadow-sm">{{ session('success') }}</div>
        @endif
        @if(session('error'))
            <div class="alert alert-danger border-0 shadow-sm">{{ session('error') }}</div>
        @endif

        {{-- Si el carrito no tiene productos --}}
        @if($items->isEmpty())
            <div class="text-center py-5">
                <h4 class="text-white mb-4">Tu carrito está vacío actualmente.</h4>
                <a href="{{ route('catalogo') }}" class="btn btn-danger btn-lg text-uppercase font-monospace rounded-0">
                    Ir al catálogo
                </a>
            </div>
        @else
            <div class="table-responsive mb-4">
                <table class="table align-middle text-white mb-0">
                    <thead>
                        <tr>
                            <th class="bg-transparent text-white border-bottom border-secondary text-uppercase small pb-3">Producto</th>
                            <th class="text-center bg-transparent text-white border-bottom border-secondary text-uppercase small pb-3">Cantidad</th>
                            <th class="text-end bg-transparent text-white border-bottom border-secondary text-uppercase small pb-3">Precio Unitario</th>
                            <th class="text-end bg-transparent text-white border-bottom border-secondary text-uppercase small pb-3">Subtotal</th>
                            <th class="text-center bg-transparent text-white border-bottom border-secondary text-uppercase small pb-3">Acciones</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($items as $item)
                        <tr>
                            <td class="bg-transparent text-white border-secondary py-3">
                                <strong>{{ $item->producto->nombre }}</strong>
                            </td>
                            
                            <td class="text-center bg-transparent text-white border-secondary py-3">
                                <form action="{{ route('carrito.actualizar', $item->id) }}" method="POST" class="d-flex justify-content-center align-items-center gap-2 m-0">
                                    @csrf
                                    @method('PUT')
                                    <input type="number" name="cantidad" value="{{ $item->cantidad }}" min="1" max="10" class="form-control form-control-sm text-center bg-dark text-white border-secondary" style="width: 70px;">
                                    <button type="submit" class="btn btn-sm btn-outline-light" title="Actualizar cantidad">
                                        ↻
                                    </button>
                                </form>
                            </td>

                            <td class="text-end bg-transparent text-white border-secondary py-3">
                                ${{ number_format($item->precio_unitario, 2, ',', '.') }}
                            </td>
                            <td class="text-end bg-transparent text-white border-secondary py-3 fw-bold">
                                ${{ number_format($item->subtotal, 2, ',', '.') }}
                            </td>
                            <td class="text-center bg-transparent text-white border-secondary py-3">
                                <form action="{{ route('carrito.eliminar', $item->id) }}" method="POST" class="m-0" onsubmit="return confirm('¿Seguro que querés quitar este producto?')">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-sm btn-outline-danger" title="Eliminar producto">
                                        Eliminar
                                    </button>
                                </form>
                                </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>

            {{-- Panel de Cierre (Total a la izquierda, Botón a la derecha) --}}
            <div class="card bg-dark text-white border-secondary p-4 shadow-sm mt-4">
                <div class="row align-items-center">
                    
                    <div class="col-12 col-md-6 text-center text-md-start mb-3 mb-md-0">
                        <h4 class="m-0 text-uppercase d-inline-block me-2">Total General:</h4>
                        <h2 class="m-0 fw-bold text-success d-inline-block align-middle">${{ number_format($carrito->total, 2, ',', '.') }}</h2>
                    </div>

                    <div class="col-12 col-md-6 text-center text-md-end">
                        <form action="{{ route('carrito.confirmar') }}" method="POST" class="m-0">
                            @csrf
                            <button type="submit" class="btn btn-success btn-lg text-uppercase font-monospace rounded-0 fw-bold px-4 px-md-5">
                                Confirmar compra
                            </button>
                        </form>
                    </div>

                </div>
            </div>
        @endif

    </div>
</div>
@endsection