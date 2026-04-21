@extends('layouts.app')

@section('title', 'Comercialización')

@section('content')

<h1 class="text-center text-white mb-5">Comercialización</h1>

<div class="row">

    <!-- ENTREGAS -->
    <div class="col-md-4 mb-4">
        <div class="card p-3 h-100 text-center">
            <i class="bi bi-box-seam fs-1 mb-3"></i>
            <h4>Tipos de entrega</h4>
            <ul class="list-unstyled">
                <li>Retiro en sucursal</li>
                <li>Entrega a domicilio</li>
                <li>Puntos de retiro</li>
            </ul>
        </div>
    </div>

    <!-- ENVÍOS -->
    <div class="col-md-4 mb-4">
        <div class="card p-3 h-100 text-center">
            <i class="bi bi-truck fs-1 mb-3"></i>
            <h4>Envíos</h4>
            <p>
                Realizamos envíos a todo el país mediante servicios de mensajería.
                Los tiempos de entrega varían entre 3 y 7 días hábiles dependiendo de la ubicación.
            </p>
        </div>
    </div>

    <!-- PAGOS -->
    <div class="col-md-4 mb-4">
        <div class="card p-3 h-100 text-center">
            <i class="bi bi-credit-card fs-1 mb-3"></i>
            <h4>Formas de pago</h4>
            <ul class="list-unstyled">
                <li>Tarjeta de crédito y débito</li>
                <li>Transferencia bancaria</li>
                <li>Mercado Pago</li>
            </ul>
        </div>
    </div>

</div>

<!-- INFO EXTRA -->
<div class="mt-5">
    <h3 class="text-white">Información adicional</h3>
    <p class="text-white">
        Para cualquier consulta sobre tu compra, podés contactarnos a través de nuestra sección de contacto.
        También contamos con políticas de cambio y devolución para garantizar tu satisfacción.
    </p>
</div>

@endsection