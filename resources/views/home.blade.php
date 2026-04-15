<!-- HERO / BIENVENIDA -->
<div class="text-center text-white py-5">
    <h1>Bienvenidos</h1>
    <p>Explorá los mejores cómics y mangas</p>
</div>
  
@extends('layouts.app')

@section('title', 'Inicio')

@section('content')

<!-- CARRUSEL DESTACADOS -->
<div class="container mb-5">

    <h2 class="text-white mb-3">🔥 Destacados</h2>

    <div id="carouselComics" class="carousel slide mx-auto" data-bs-ride="carousel" style="max-width: 600px;">

        <div class="carousel-inner">

            <div class="carousel-item active">
                <img src="{{ asset('images/Absolute-Batman.png') }}" class="d-block w-100">
            </div>

            <div class="carousel-item">
                <img src="{{ asset('images/dandadan.png') }}" class="d-block w-100">
            </div>

            <div class="carousel-item">
                <img src="{{ asset('images/Secretwars.png') }}" class="d-block w-100">
            </div>

        </div>

        <button class="carousel-control-prev" type="button" data-bs-target="#carouselComics" data-bs-slide="prev">
            <span class="carousel-control-prev-icon"></span>
        </button>

        <button class="carousel-control-next" type="button" data-bs-target="#carouselComics" data-bs-slide="next">
            <span class="carousel-control-next-icon"></span>
        </button>

    </div>

</div>

<!-- SECCIÓN MARVEL -->
<div class="container mb-5">

    <h3 class="text-white mb-3">Marvel</h3>

    <div class="row">

        <div class="col-md-3">
            <div class="card">
                <img src="{{ asset('images/marvel1.jpg') }}" class="card-img-top">
                <div class="card-body">
                    <h5>Spider-Man</h5>
                </div>
            </div>
        </div>

        <div class="col-md-3">
            <div class="card">
                <img src="{{ asset('images/marvel2.jpg') }}" class="card-img-top">
                <div class="card-body">
                    <h5>Ms. Marvel</h5>
                </div>
            </div>
        </div>
        <div class="col-md-3">
            <div class="card">
                <img src="{{ asset('images/Secretwars.png') }}" class="card-img-top">
                <div class="card-body">
                    <h5>Secret Wars</h5>
                </div>
            </div>
        </div>
    </div>

</div>

<!-- SECCIÓN DC -->
<div class="container mb-5">

    <h3 class="text-white mb-3">DC</h3>

    <div class="row">

        <div class="col-md-3">
            <div class="card">
                <img src="{{ asset('images/dc1.jpg') }}" class="card-img-top">
                <div class="card-body">
                    <h5>Batman</h5>
                </div>
            </div>
        </div>

        <div class="col-md-3">
            <div class="card">
                <img src="{{ asset('images/dc2.jpg') }}" class="card-img-top">
                <div class="card-body">
                    <h5>Superman</h5>
                </div>
            </div>
        </div>

        <div class="col-md-3">
            <div class="card">
                <img src="{{ asset('images/dc2.jpg') }}" class="card-img-top">
                <div class="card-body">
                    <h5>Flashpoint</h5>
                </div>
            </div>
        </div>

    </div>


    <!-- SECCIÓN MANGA -->
<div class="container mb-5">

    <h3 class="text-white mb-3">Manga</h3>

    <div class="row">

        <div class="col-md-3">
            <div class="card">
                <img src="{{ asset('images/marvel1.jpg') }}" class="card-img-top">
                <div class="card-body">
                    <h5>DandaDan</h5>
                </div>
            </div>
        </div>

        <div class="col-md-3">
            <div class="card">
                <img src="{{ asset('images/marvel2.jpg') }}" class="card-img-top">
                <div class="card-body">
                    <h5>One Piece</h5>
                </div>
            </div>
        </div>


        <div class="col-md-3">
            <div class="card">
                <img src="{{ asset('images/Chainsaw.png') }}" class="card-img-top">
                <div class="card-body">
                    <h5>Chainsaw Man</h5>
                    <h7>Chainsaw Man es un anime y manga de acción y fantasía oscura que sigue a Denji, un adolescente extremadamente pobre que, tras ser traicionado y asesinado, renace fusionado con su mascota, el demonio motosierra Pochita. Ahora convertido en un híbrido, Denji se une a los Cazadores de Demonios de Seguridad Pública para enfrentar monstruos nacidos del miedo humano en un mundo cínico y violento. </h7>
                </div>
            </div>
        </div>

        <div class="col-md-3">
            <div class="card">
                <img src="{{ asset('images/marvel2.jpg') }}" class="card-img-top">
                <div class="card-body">
                    <h5>Naruto</h5>
                </div>
            </div>
        </div>

        <div class="col-md-3">
            <div class="card">
                <img src="{{ asset('images/marvel2.jpg') }}" class="card-img-top">
                <div class="card-body">
                    <h5>My Hero Academia</h5>
                </div>
            </div>
        </div>

    </div>

</div>

</div>

@endsection