@extends('layouts.app')

@section('title', 'Quiénes Somos')

@section('content')

<h1 class="text-center text-white mb-5">Quiénes Somos</h1>

<div class="row mb-5">
    <div class="col-md-6">
        <h3 class="text-white">Nuestra historia</h3>
        <p class="text-white">
            Circle Q nació como un proyecto entre apasionados por el mundo del cómic y el manga,
            con el objetivo de acercar las mejores historias a todos los fans. Desde nuestros inicios,
            buscamos ofrecer una experiencia única combinando variedad, calidad y atención personalizada.
        </p>
    </div>
    <div class="col-md-6">
        <img src="/images/fondo-heroes.jpg.jpg" class="img-fluid rounded">
    </div>
</div>

<div class="row mb-5">
    <div class="col-md-6 order-md-2">
        <h3 class="text-white">Nuestro objetivo</h3>
        <p class="text-white">
            Nuestro objetivo es convertirnos en un punto de referencia para los amantes del cómic y el manga,
            ofreciendo productos originales, novedades y una comunidad donde compartir esta pasión.
        </p>
    </div>
    <div class="col-md-6 order-md-1">
        <img src="/images/logo.png" class="img-fluid rounded">
    </div>
</div>

<h2 class="text-center text-white mb-4">Nuestro equipo</h2>

<div class="row text-center">

    <div class="col-md-4 mb-4">
        <img src="/images/team1.jpg" class="rounded-circle mb-2" width="150" height="150">
        <h5 class="text-white">Rodrigo Pérez</h5>
        <p class="text-white">Desarrollador Web</p>
    </div>

    <div class="col-md-4 mb-4">
        <img src="/images/team2.jpg" class="rounded-circle mb-2" width="150" height="150">
        <h5 class="text-white">Lourdes Monzón</h5>
        <p class="text-white">Desarrolladora Web</p>
    </div>

</div>

@endsection