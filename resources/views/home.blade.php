@extends('layouts.app')
@section('title', 'Inicio')

@section('content')

<div class="hero text-center text-white">
    <h1>Bienvenidos</h1>
    <p>Explorá los mejores cómics y mangas</p>
</div>

<div class="container mb-5">
    <h2 class="text-white mb-3">🔥 Anuncios</h2>
    <div class="scroll-horizontal">
        <div class="scroll-track">
            <div class="item"><img src="{{ asset('images/7.png') }}"></div>
            <div class="item"><img src="{{ asset('images/8.png') }}"></div>
            <div class="item"><img src="{{ asset('images/4.png') }}"></div>
            <div class="item"><img src="{{ asset('images/7.png') }}"></div>
            <div class="item"><img src="{{ asset('images/8.png') }}"></div>
            <div class="item"><img src="{{ asset('images/4.png') }}"></div>
        </div>
    </div>
</div>

@foreach($editoriales as $editorial)
<div class="container mb-5">
    <div class="d-flex justify-content-between align-items-center mb-4">
        <h3 class="text-white">{{ $editorial }}</h3>
        <a href="/catalogo?editorial_filtro={{ $editorial }}" class="btn btn-danger btn-sm btn-round">Mas</a>
    </div>

    <div class="row">

       @foreach($productos->where('editorial', $editorial)->where('activo', true)->take(4) as $producto)
        
        @php
            $stockDisponible = $producto->stock;
            if(auth()->check()) {
                $carrito = \App\Models\VentaCabecera::where('user_id', auth()->id())
                                                    ->where('estado', 'carrito')
                                                    ->first();
                if($carrito) {
                    $item = $carrito->detalles()->where('producto_id', $producto->id)->first();
                    if($item) {
                        $stockDisponible = $producto->stock - $item->cantidad;
                    }
                }
            }
        @endphp
        <div class="col-12 col-md-3 mb-4">
            <div class="card h-100 shadow-sm border-0">
              <img src="{{ asset('storage/' . $producto->url_imagen) }}" class="card-img-top rounded-0" alt="{{ $producto->nombre }}">
                <div class="card-body d-flex flex-column p-3">
                    
                    <h5 class="mb-1">{{ $producto->nombre }}</h5>
                    <p class="small flex-grow-1 mb-3">{{ Str::limit($producto->descripcion, 70) }}</p>
                    
                    <div class="mt-auto">
                        <h6 class="fw-bold mb-3 fs-5">${{ number_format($producto->precio, 2) }}</h6>
                        
                        @auth
                            @if(auth()->user()->role != 'admin')
                                <div class="mb-2 text-center">
                                    @if($stockDisponible <= 0)
                                        <span class="text-danger fw-bold small">Sin stock disponible</span>
                                    @elseif($stockDisponible <= 3)
                                        <span class="text-warning fw-bold small">
                                            ¡{{ $stockDisponible == 1 ? 'Última unidad!' : 'Últimas ' . $stockDisponible . ' unidades!' }}
                                        </span>
                                    @endif
                                </div>

                                <form action="{{ route('carrito.agregar') }}" method="POST" class="d-block m-0 p-0">
                                    @csrf
                                    <input type="hidden" name="producto_id" value="{{ $producto->id }}">

                                    <div class="input-group input-group-sm mb-2">
                                        <span class="input-group-text bg-dark text-white border-secondary">Cant.</span>
                                        <input type="number" name="cantidad" class="form-control text-center bg-dark text-white border-secondary" 
                                               value="1" min="1" max="{{ $stockDisponible > 0 ? $stockDisponible : 1 }}" 
                                               oninput="if(this.value > {{ $stockDisponible }}) this.value = {{ $stockDisponible }};"
                                               required {{ $stockDisponible <= 0 ? 'disabled' : '' }}>
                                    </div>

                                    <button type="submit" class="btn btn-success btn-sm w-100 rounded-0 py-2 text-uppercase font-monospace fw-bold" 
                                            {{ $stockDisponible <= 0 ? 'disabled' : '' }}>
                                        {{ $stockDisponible <= 0 ? 'Sin stock' : 'Agregar al carrito' }}
                                    </button>
                                </form>
                            @endif
                        @endauth

                        @guest
                            <div class="input-group input-group-sm mb-2">
                                <span class="input-group-text bg-dark text-white border-secondary">Cant.</span>
                                <input type="number" class="form-control text-center bg-dark text-white border-secondary" value="1" disabled>
                            </div>
                            
                            <button type="button" class="btn btn-secondary btn-sm w-100 rounded-0 py-2 text-uppercase font-monospace" onclick="pedirLogin()">
                                Agregar al carrito
                            </button>
                        @endguest
                    </div>
                </div>
            </div>
        </div>
        @endforeach
    </div>
</div>
@endforeach

<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script>
    document.addEventListener("DOMContentLoaded", function() {
        
        // 1. Alerta de Éxito al agregar al carrito
        @if(session('success'))
            Swal.fire({
                icon: 'success',
                title: '<span style="color: #000000; text-shadow: none !important;" class="fw-bold fs-2">¡Excelente!</span>',
                text: "{{ session('success') }}",
                showConfirmButton: true,
                confirmButtonText: '<i class="bi bi-cart-check me-1"></i> Seguir comprando',
                confirmButtonColor: '#b62d2d', 
                timer: 2000, 
                timerProgressBar: true, 
                backdrop: `rgba(0,0,0,0.4)`, 
                customClass: {
                    popup: 'rounded-4 shadow-none border-0'
                }
            });
        @endif

        // 2. Alerta de Error de Stock
        @if(session('error'))
            Swal.fire({
                icon: 'error',
                title: 'Atención',
                text: "{{ session('error') }}",
                confirmButtonColor: '#dc3545',
                customClass: {
                    popup: 'rounded-4 shadow-none border-0'
                }
            });
        @endif

        // 3. Alerta de Error de Validación
        @if($errors->any())
            Swal.fire({
                icon: 'warning',
                title: 'No se pudo procesar',
                text: "{{ $errors->first() }}",
                confirmButtonColor: '#ffc107',
                customClass: {
                    popup: 'rounded-4 shadow-none border-0'
                }
            });
        @endif

    });

    // 4. Función para invitar a loguearse con opciones (Visitantes)
    function pedirLogin() {
        Swal.fire({
            icon: 'info',
            title: '<span style="color: #000000; text-shadow: none !important;" class="fw-bold fs-3">¡Atención!</span>',
            text: 'Debe generar un usuario o registrarse para agregar productos al carrito.',
            showCancelButton: true,
            confirmButtonColor: '#212529',
            cancelButtonColor: '#dc3545',
            confirmButtonText: 'Aceptar',
            cancelButtonText: 'Cancelar',
            backdrop: `rgba(0,0,0,0.6)`,
            customClass: {
                popup: 'rounded-4 shadow-none border-0'
            }
        }).then((result) => {
            if (result.isConfirmed) {
                // Al tocar aceptar, los manda directo a la página de login
                window.location.href = "{{ route('login') }}"; 
            }
        });
    }
</script>

@endsection