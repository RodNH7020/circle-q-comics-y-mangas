@extends('layouts.app') {{-- O el layout principal que uses en tu proyecto --}}

@section('content')
<div class="container my-5">
    <h2 class="mb-4">Tu Carrito de Compras - Circle Q</h2>

    {{-- Mensajes de Éxito o Error --}}
    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif
    @if(session('error'))
        <div class="alert alert-danger">{{ session('error') }}</div>
    @endif

    {{-- Si el carrito no tiene productos --}}
    @if($items->isEmpty())
        <div class="alert alert-info">
            Tu carrito está vacío actualmente. <a href="{{ url('/catalogo') }}">Ver catálogo de mangas y cómics</a>.
        </div>
    @else
        <div class="table-responsive">
            <table class="table table-striped align-middle">
                <thead class="table-dark">
                    <tr>
                        <th>Producto</th>
                        <th class="text-center">Cantidad</th>
                        <th class="text-end">Precio Unitario</th>
                        <th class="text-end">Subtotal</th>
                        <th class="text-center">Acciones</th>
                    </tr>
                </thead>
                <tbody>
                    {{-- 📄 RECORRIDO DE LOS PRODUCTOS (Según tu guía) --}}
                    @foreach($items as $item)
                    <tr>
                        <td>
                            <strong>{{ $item->producto->nombre }}</strong>
                        </td>
                        <td class="text-center">{{ $item->cantidad }}</td>
                        <td class="text-end">${{ number_format($item->precio_unitario, 2, ',', '.') }}</td>
                        <td class="text-end">${{ number_format($item->subtotal, 2, ',', '.') }}</td>
                        <td class="text-center">
                            {{-- 📄 BOTÓN ELIMINAR CON MÉTODO DELETE (Según tu guía) --}}
                            <form action="{{ route('carrito.eliminar', $item->id) }}" method="POST" onsubmit="return confirm('¿Seguro querés quitar este producto?')">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-sm btn-danger">Eliminar</button>
                            </form>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>

        {{-- Panel de Cierre con el Total General --}}
        <div class="row justify-content-end mt-4">
            <div class="col-md-4 text-end">
                <div class="card p-3 bg-light">
                    <h4>Total General: <span class="text-primary">${{ number_format($carrito->total, 2, ',', '.') }}</span></h4>
                    <hr>
                    {{-- 📄 FORMULARIO Y BOTÓN CONFIRMAR COMPRA (Según tu guía) --}}
                    <form action="{{ route('carrito.confirmar') }}" method="POST">
                        @csrf
                        <button type="submit" class="btn btn-success btn-lg w-100">Confirmar compra</button>
                    </form>
                </div>
            </div>
        </div>
    @endif
</div>
@endsection