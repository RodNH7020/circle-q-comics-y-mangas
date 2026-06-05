@extends('layouts.app') {{-- Usá el mismo layout de tu proyecto --}}

@section('content')
<div class="container my-5 text-center">
    <div class="card p-5 shadow-sm mx-auto" style="max-width: 600px;">
        {{-- Icono de éxito --}}
        <div class="text-success mb-4">
            <svg xmlns="http://www.w3.org/2000/svg" width="64" height="64" fill="currentColor" class="bi bi-check-circle-fill" viewBox="0 0 16 16">
                <path d="M16 8A8 8 0 1 1 0 8a8 8 0 0 1 16 0m-3.97-3.03a.75.75 0 0 0-1.08.022L7.477 9.417 5.384 7.323a.75.75 0 0 0-1.06 1.06L6.97 11.03a.75.75 0 0 0 1.079-.02l3.992-4.99a.75.75 0 0 0-.01-1.05z"/>
            </svg>
        </div>

        <h2 class="mb-3">¡Gracias por tu compra!</h2>
        <p class="text-muted">Tu pedido en <strong>Circle Q</strong> ha sido procesado con éxito.</p>
        <hr>

        {{-- Resumen de lo que compró --}}
        <h5 class="text-start mb-3">Resumen del Pedido:</h5>
        <ul class="list-group list-group-flush text-start mb-4">
            @if(session('items'))
                @foreach(session('items') as $item)
                    <li class="list-group-item d-flex justify-content-between align-items-center">
                        <div>
                            <strong>{{ $item->producto->nombre }}</strong>
                            <small class="text-muted d-block">Cantidad: {{ $item->cantidad }}</small>
                        </div>
                        <span class="text-muted">${{ number_format($item->subtotal, 2, ',', '.') }}</span>
                    </li>
                @endforeach
            @endif
        </ul>

        <div class="d-flex justify-content-between align-items-center bg-light p-3 rounded mb-4">
            <span class="h5 mb-0">Total Abonado:</span>
            <span class="h4 mb-0 text-success"><strong>${{ number_format(session('total'), 2, ',', '.') }}</strong></span>
        </div>

        {{-- Botón para volver --}}
        <a href="{{ route('cliente.dashboard') }}" class="btn btn-primary btn-lg w-100">Volver a mi Panel</a>
    </div>
</div>
@endsection