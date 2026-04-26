@extends('layouts.app')

@section('title', 'Inicio')

@section('content')

<!-- HERO -->
<div class="hero text-center text-white">
<h1>Bienvenidos</h1>
<p>Explorá los mejores cómics y mangas</p>
</div>

<!-- CARRUSEL HORIZONTAL -->
<div class="container mb-5">
<h2 class="text-white mb-3">🔥 Anuncios</h2>

<div class="scroll-horizontal">
  <div class="scroll-track">

    <!-- originales -->
    <div class="item"><img src="{{ asset('images/7.png') }}"></div>
    <div class="item"><img src="{{ asset('images/8.png') }}"></div>
    <div class="item"><img src="{{ asset('images/4.png') }}"></div>

    <!-- duplicados (NECESARIOS para infinito) -->
    <div class="item"><img src="{{ asset('images/7.png') }}"></div>
    <div class="item"><img src="{{ asset('images/8.png') }}"></div>
    <div class="item"><img src="{{ asset('images/4.png') }}"></div>

  </div>
</div>

</div>


</div>
</div>


<!-- MARVEL -->
<div class="container">
<div class="d-flex justify-content-between align-items-center mb-4">
<h3 class="text-white">Marvel</h3>
<a href="/catalogo" class="btn btn-danger btn-sm btn-round">Mas</a>
</div>

<div class="row">

<div class="col-md-3">
<div class="card">
<img src="{{ asset('images/Spiderverse.jpg') }}">
<div class="card-body">
<h5>Spider-verse</h5>
<p>Varias versiones de Spider-Man de distintos universos deben unirse para evitar que una familia de vampiros interdimensionales los cace hasta la extinción.</p>
</div>
</div>
</div>

<div class="col-md-3">
<div class="card">
<img src="{{ asset('images/msmarvel.jpg') }}">
<div class="card-body">
<h5>Ms. Marvel</h5>
<p>Una adolescente fanática de los superhéroes descubre que tiene poderes polimórficos y debe equilibrar su vida familiar con su nuevo rol como heroína.</p>
</div>
</div>
</div>

<div class="col-md-3">
<div class="card">
<img src="{{ asset('images/Secretwars.png') }}">
<div class="card-body">
<h5>Secret Wars</h5>
<p>El multiverso colapsa y los restos de diferentes realidades se fusionan en "Battleworld", un planeta regido por el puño de hierro del Doctor Doom. Heroes y villanos de todos los universos deben unirse para sobrevivir.</p>
</div>
</div>
</div>

<div class="col-md-3">
<div class="card">
<img src="{{ asset('images/civilwar.jpg') }}">
<div class="card-body">
<h5>Civil War</h5>
<p>Tras una tragedia nacional, el gobierno promulga una ley de registro de superhumanos, provocando un enfrentamiento ideológico y físico entre Iron Man y el Capitán América.</p>
</div>
</div>
</div>


</div>
</div>

<!-- DC  -->
<div class="container">

<div class="d-flex justify-content-between align-items-center mb-4">
<h3 class="text-white">DC</h3>
<a href="/catalogo" class="btn btn-danger btn-sm btn-round">Mas</a>
</div>

<div class="row">

<div class="col-md-3">
<div class="card">
<img src="{{ asset('images/Absolute-Batman.png') }}">
<div class="card-body">
<h5>Batman Absoluto</h5>
<p>Una reinvención cruda donde un Bruce Wayne sin fortuna ni privilegios debe usar su ingenio y fuerza bruta para limpiar una Gotham sumida en el caos.</p>
</div>
</div>
</div>

<div class="col-md-3">
<div class="card">
<img src="{{ asset('images/AllStarSuperman.jpg') }}">
<div class="card-body">
<h5>All-Star Superman</h5>
<p>Ante la noticia de su muerte inminente, Superman decide dedicar sus últimos días a realizar doce hazañas legendarias para asegurar su legado en la Tierra.</p>
</div>
</div>
</div>

<div class="col-md-3">
<div class="card">
<img src="{{ asset('images/flashpoint.jpg') }}">
<div class="card-body">
<h5>Flashpoint</h5>
<p>Barry Allen viaja al pasado para salvar a su madre, pero al despertar descubre que ha alterado la realidad, creando un mundo oscuro al borde de la guerra.</p>
</div>
</div>
</div>

<div class="col-md-3">
<div class="card">
<img src="{{ asset('images/Thedark.webp') }}">
<div class="card-body">
<h5>El Regreso del Caballero de la Noche</h5>
<p>En un futuro distópico, un Bruce Wayne envejecido y retirado decide retomar el manto de Batman para combatir la creciente ola de violencia que azota a Gotham.</p>
</div>
</div>
</div>


</div>
</div>

<!-- MANGA -->
<div class="container">

<div class="d-flex justify-content-between align-items-center mb-4">
<h3 class="text-white">Manga</h3>
<a href="/catalogo" class="btn btn-danger btn-sm btn-round">Mas</a>
</div>

<div class="row">

<div class="col-md-3">
<div class="card">
<img src="{{ asset('images/dandadan.png') }}">
<div class="card-body">
<h5>Dandadan</h5>
<p>Un chico fan de los alienígenas y una chica que cree en fantasmas se ven envueltos en batallas sobrenaturales tras descubrir que ambos tipos de entidades existen.</p>
</div>
</div>
</div>

<div class="col-md-3">
<div class="card">
<img src="{{ asset('images/Onepiece.jpg') }}">
<div class="card-body">
<h5>One Piece</h5>
<p>Monkey D. Luffy y su tripulación navegan por mares peligrosos en busca del tesoro legendario para que él pueda convertirse en el próximo Rey de los Piratas.</p>
</div>
</div>
</div>

<div class="col-md-3">
<div class="card">
<img src="{{ asset('images/Chainsaw.png') }}">
<div class="card-body">
<h5>Chainsaw Man</h5>
<p>Un joven con deudas extremas se fusiona con su perro demonio para sobrevivir, convirtiéndose en un cazador de demonios con motosierras en el cuerpo.</p>
</div>
</div>
</div>

<div class="col-md-3">
<div class="card">
<img src="{{ asset('images/Naruto.webp') }}">
<div class="card-body">
<h5>Naruto</h5>
<p>Un ninja marginado que alberga un demonio en su interior lucha por ganar el reconocimiento de su aldea y cumplir su sueño de convertirse en Hokage.</p>
</div>
</div>
</div>
<!-- DC  
<div class="col-md-3">
<div class="card">
<img src="{{ asset('images/marvel2.jpg') }}">
<div class="card-body">
<h5>My Hero Academia</h5>
<p>En un mundo donde casi todos tienen superpoderes, un chico que nació sin ellos hereda el don del héroe más grande para estudiar en una academia de élite.</p>
</div>
</div>
</div>

</div>
</div> -->

@endsection