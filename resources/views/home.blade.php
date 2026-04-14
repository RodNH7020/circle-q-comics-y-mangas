<!DOCTYPE html>
<html>

<body>
@extends('layouts.app')

@section('title', 'Inicio')

@section('content')
<div class="d-flex justify-content-center align-items-start vh-100">
    <div class="text-center">
        <h1>Bienvenidos</h1>
        <p>Explorá los mejores cómics</p>
    </div>
</div>

<div id="carouselComics" class="carousel slide" data-bs-ride="carousel">

    <!-- Indicadores -->
    <div class="carousel-indicators">
        <button type="button" data-bs-target="#carouselComics" data-bs-slide-to="0" class="active"></button>
        <button type="button" data-bs-target="#carouselComics" data-bs-slide-to="1"></button>
        <button type="button" data-bs-target="#carouselComics" data-bs-slide-to="2"></button>
    </div>

    <!-- Imágenes -->
    <div class="carousel-inner">

        <div class="carousel-item active">
            <img src="/images/comic1.jpg" class="d-block w-100">
        </div>

        <div class="carousel-item">
            <img src="/images/comic2.jpg" class="d-block w-100">
        </div>

        <div class="carousel-item">
            <img src="/images/comic3.jpg" class="d-block w-100">
        </div>

    </div>

    <!-- Botones -->
    <button class="carousel-control-prev" type="button" data-bs-target="#carouselComics" data-bs-slide="prev">
        <span class="carousel-control-prev-icon"></span>
    </button>

    <button class="carousel-control-next" type="button" data-bs-target="#carouselComics" data-bs-slide="next">
        <span class="carousel-control-next-icon"></span>
    </button>

</div>


@endsection
    

</body>
</html>