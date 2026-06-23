@extends('layouts.app')

@section('title', 'Catálogo')

@section('content')

<div class="container my-4 my-md-5">
    <!-- Envolvemos todo en tu tarjeta personalizada con clase fondo-texto -->
    <div class="card shadow-sm border-0 p-3 p-sm-4 p-md-5 fondo-texto">
        
        <div class="hero text-center mb-4 pb-3 border-bottom">
            <h1 class="fw-bold">Catálogo de Productos</h1>
        </div>

        <form action="{{ url()->current() }}" method="GET" id="form-filtros"></form>
        
        <div class="m-0">
            <div class="row g-4">
                
                <!-- ========================================================
                     COLUMNA IZQUIERDA: MENÚ LATERAL (En mobile se acomoda arriba)
                     ======================================================== -->
                <div class="col-12 col-md-3">
                    <button class="btn btn-danger w-100 d-md-none mb-3 d-flex align-items-center justify-content-center gap-2" 
                            type="button" data-bs-toggle="collapse" data-bs-target="#collapseFiltros">
                        <i class="bi bi-filter-left fs-5"></i> 
                        <span>Ver / Ocultar Filtros</span>
                    </button>

                    <div class="collapse d-md-block" id="collapseFiltros">
                        <!-- Categorías -->
                        <div class="filter-group mb-4">
                            <h5 class="fw-bold text-uppercase pb-2 border-bottom">Categorías</h5>
                            <div class="d-flex flex-column gap-2 mt-2">
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="categoria" id="cat_todas" value="" 
                                           {{ !isset($request->categoria) || $request->categoria == '' ? 'checked' : '' }} onchange="document.getElementById('form-filtros').submit()">
                                    <label class="form-check-label text-uppercase small" for="cat_todas">Todas</label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="categoria" id="cat_manga" value="manga" form="form-filtros"
                                           {{ isset($request->categoria) && $request->categoria == 'manga' ? 'checked' : '' }} onchange="document.getElementById('form-filtros').submit()">
                                    <label class="form-check-label text-uppercase small" for="cat_manga">Manga</label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="categoria" id="cat_comic" value="comic" form="form-filtros"
                                           {{ isset($request->categoria) && $request->categoria == 'comic' ? 'checked' : '' }} onchange="document.getElementById('form-filtros').submit()">
                                    <label class="form-check-label text-uppercase small" for="cat_comic">Comic</label>
                                </div>
                            </div>
                        </div>

                        <!-- Editoriales -->
                        <div class="filter-group mb-4">
                            <h5 class="fw-bold text-uppercase pb-2 border-bottom">Editoriales</h5>
                            <div class="d-flex flex-column gap-2 mt-2">
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="editorial_filtro" id="edit_todas" value="" form="form-filtros"
                                           {{ !isset($request->editorial_filtro) || $request->editorial_filtro == '' ? 'checked' : '' }} onchange="document.getElementById('form-filtros').submit()">
                                    <label class="form-check-label text-uppercase small" for="edit_todas">Todas las Editoriales</label>
                                </div>
                                
                                @foreach($editorialesDisponibles as $editorial)
                                    <div class="form-check">
                                        <input class="form-check-input" type="radio" name="editorial_filtro" id="edit_{{ Str::slug($editorial) }}" value="{{ $editorial }}" form="form-filtros"
                                               {{ isset($request->editorial_filtro) && $request->editorial_filtro == $editorial ? 'checked' : '' }} onchange="document.getElementById('form-filtros').submit()">
                                        <label class="form-check-label text-uppercase small" for="edit_{{ Str::slug($editorial) }}">{{ $editorial }}</label>
                                    </div>
                                @endforeach
                            </div>
                        </div>

                        <a href="{{ url()->current() }}" class="btn btn-outline-danger btn-sm w-100 mt-2">
                            Limpiar Filtros
                        </a>
                    </div>
                </div>

                <!-- ========================================================
                     COLUMNA DERECHA: BARRA SUPERIOR Y PRODUCTOS
                     ======================================================== -->
                <div class="col-12 col-md-9">
                    
                    <!-- Barra de Ordenar y Buscar (Ajustada para que no se rompa en celulares) -->
                    <div class="row align-items-end mb-4 g-3">
                        
                        <!-- Ordenar por (Alineado a la izquierda) -->
                        <div class="col-12 col-sm-5 col-md-4">
                            <label for="orden" class="form-label small text-white mb-1">Ordenar por:</label>
                            <select name="orden" id="orden" class="form-select form-select-sm" form="form-filtros" onchange="document.getElementById('form-filtros').submit()">
                                <option value="az" {{ isset($request) && $request->orden == 'az' ? 'selected' : '' }}>Alfabético (A-Z)</option>
                                <option value="precio_asc" {{ isset($request) && $request->orden == 'precio_asc' ? 'selected' : '' }}>Precio: Menor a Mayor</option>
                                <option value="precio_desc" {{ isset($request) && $request->orden == 'precio_desc' ? 'selected' : '' }}>Precio: Mayor a Menor</option>
                            </select>
                        </div>

                        <!-- Espaciador responsivo dinámico -->
                        <div class="col-sm-1 col-md-3 d-none d-sm-block"></div>

                        <!-- Buscador (Toma el centro/derecha restante) -->
                        <div class="col-12 col-sm-6 col-md-5">
                            <label for="buscar" class="form-label small text-white mb-1">Buscar producto:</label>
                            <div class="input-group input-group-sm">
                                <input type="text" name="buscar" id="buscar" class="form-control" form="form-filtros" placeholder="Nombre, descripción..." value="{{ $request->buscar ?? '' }}">
                                <button type="submit" form="form-filtros" class="btn btn-dark">Buscar</button>
                            </div>
                        </div>
                    </div>

                    <!-- Grilla de productos responsiva -->
                    <div class="row g-3 g-md-4">
                        
                        @forelse($comics as $comic)

                            @php
                                $stockDisponible = $comic->stock;
                                if(auth()->check()) {
                                    $carrito = \App\Models\VentaCabecera::where('user_id', auth()->id())
                                                                        ->where('estado', 'carrito')
                                                                        ->first();
                                    if($carrito) {
                                        $item = $carrito->detalles()->where('producto_id', $comic->id)->first();
                                        if($item) {
                                            // Le restamos al stock lo que ya tiene separado en el carrito
                                            $stockDisponible = $comic->stock - $item->cantidad;
                                        }
                                    }
                                }
                            @endphp

                            <div class="col-12 col-sm-6 col-md-4 mb-3">
                                <div class="card h-100 shadow-sm border-0 bg-light">
                                    
                                    <img src="{{ asset('storage/' . $comic->url_imagen) }}" class="card-img-top rounded-0" alt="{{ $comic->nombre }}">
                                    
                                    <div class="card-body d-flex flex-column p-3">
                                        <h6 class="fw-bold mb-1 text-black">{{ $comic->nombre }}</h6>
                                        
                                        @if($comic->editorial)
                                            <span class="text-black small mb-2 d-block fw-semibold">{{ $comic->editorial }}</span>
                                        @endif
                                        
                                        <p class="text-black small card-text flex-grow-1 mb-3">{{ Str::limit($comic->descripcion, 75) }}</p>
                                        
                                        <div class="mt-auto">
                                            <h6 class="fw-bold text-dark mb-3 fs-5">${{ number_format($comic->precio, 2) }}</h6>
                                            
                                            @auth
                                                <!-- ¡AQUÍ ESTÁ LA CONDICIÓN! Si NO es admin, muestra todo esto -->
                                                @if(auth()->user()->role != 'admin')
                                                    {{-- MENSAJE DE STOCK USANDO EL STOCK DISPONIBLE REAL --}}
                                                    <div class="mb-2 text-center">
                                                        @if($stockDisponible <= 0)
                                                            <span class="text-danger fw-bold small">Sin stock disponible</span>
                                                        @elseif($stockDisponible <= 3)
                                                            <span class="text-warning fw-bold small">
                                                                ¡{{ $stockDisponible == 1 ? 'Última unidad disponible!' : 'Últimas ' . $stockDisponible . ' unidades disponibles!' }}
                                                            </span>
                                                        @endif
                                                    </div>

                                                    <form action="{{ route('carrito.agregar') }}" method="POST" class="d-block m-0 p-0">
                                                        @csrf
                                                        <input type="hidden" name="producto_id" value="{{ $comic->id }}">

                                                        <div class="input-group input-group-sm mb-2">
                                                            <span class="input-group-text bg-light text-black">Cant.</span>
                                                            <input type="number" name="cantidad" class="form-control text-center" 
                                                                   value="1" min="1" max="{{ $stockDisponible > 0 ? $stockDisponible : 1 }}" 
                                                                   oninput="if(this.value > {{ $stockDisponible }}) this.value = {{ $stockDisponible }};"
                                                                   required {{ $stockDisponible <= 0 ? 'disabled' : '' }}>
                                                        </div>

                                                        <button type="submit" class="btn btn-dark btn-sm w-100 rounded-0 py-2 text-uppercase font-monospace" 
                                                                {{ $stockDisponible <= 0 ? 'disabled' : '' }}>
                                                            {{ $stockDisponible <= 0 ? 'Sin stock' : 'Agregar al carrito' }}
                                                        </button>
                                                    </form>
                                                @endif
                                            @endauth

                                            @guest
                                                <div class="input-group input-group-sm mb-2">
                                                    <span class="input-group-text bg-light text-muted">Cant.</span>
                                                    <input type="number" class="form-control text-center" value="1" disabled>
                                                </div>
                                                <!-- Botón arreglado para llamar a la alerta bonita -->
                                                <button type="button" class="btn btn-secondary btn-sm w-100 rounded-0 py-2 text-uppercase font-monospace" onclick="pedirLogin()">
                                                    Agregar al carrito
                                                </button>
                                            @endguest
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @empty
                            <div class="col-12 text-center my-5">
                                <p class="form-label small text-white mb-1">No hay productos que coincidan con los filtros seleccionados.</p>
                            </div>
                        @endforelse
                    </div>

                </div>
            </div>
        </div>
    </div>
</div>

<!-- Importamos SweetAlert2 una sola vez -->
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

<script>
    document.addEventListener("DOMContentLoaded", function() {
        
        // 1. Alerta de Éxito
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

    // 4. Función para invitar a loguearse con opciones
    function pedirLogin() {
        Swal.fire({
            icon: 'info',
            title: '<span style="color: #000000; text-shadow: none !important;" class="fw-bold fs-3">¡Hola!</span>',
            text: 'Necesitas iniciar sesión o registrarte para sumar productos a tu carrito.',
            showCancelButton: true,
            confirmButtonColor: '#212529', // Botón oscuro (Iniciar sesión)
            cancelButtonColor: '#dc3545',  // Botón rojo (Cancelar)
            confirmButtonText: 'Iniciar sesión',
            cancelButtonText: 'Cancelar',
            backdrop: `rgba(0,0,0,0.6)`,
            customClass: {
                popup: 'rounded-4 shadow-none border-0'
            }
        }).then((result) => {
            // Si el usuario toca "Iniciar sesión", lo llevamos al login
            if (result.isConfirmed) {
                window.location.href = "{{ route('login') }}";
            }
            // Si toca "Cancelar", no hace nada y se queda en la página
        });
    }
</script>
@endsection