@extends('layouts.app')

@section('title', 'Catálogo')

@section('content')

<div class="hero text-center text-white">
<h1>Catálogo Completo (A-Z)</h1>
</div>

@php
$comics = [

["titulo"=>"All-Star Superman","img"=>"AllStarSuperman.jpg","desc"=>"Ante la noticia de su muerte inminente, Superman decide dedicar sus últimos días a realizar doce hazañas legendarias para asegurar su legado en la Tierra."],

["titulo"=>"Batman Absoluto","img"=>"Absolute-Batman.png","desc"=>"Una reinvención cruda donde un Bruce Wayne sin fortuna ni privilegios debe usar su ingenio y fuerza bruta para limpiar una Gotham sumida en el caos."],

["titulo"=>"Chainsaw Man","img"=>"Chainsaw.png","desc"=>"Un joven con deudas extremas se fusiona con su perro demonio para sobrevivir, convirtiéndose en un cazador de demonios con motosierras en el cuerpo."],

["titulo"=>"Civil War","img"=>"civilwar.jpg","desc"=>"Tras una tragedia nacional, el gobierno promulga una ley de registro de superhumanos, provocando un enfrentamiento ideológico y físico entre Iron Man y el Capitán América."],

["titulo"=>"Dandadan","img"=>"dandadan.png","desc"=>"Un chico fan de los alienígenas y una chica que cree en fantasmas se ven envueltos en batallas sobrenaturales tras descubrir que ambos tipos de entidades existen."],

["titulo"=>"El Regreso del Caballero de la Noche","img"=>"Thedark.webp","desc"=>"En un futuro distópico, un Bruce Wayne envejecido y retirado decide retomar el manto de Batman para combatir la creciente ola de violencia que azota a Gotham."],

["titulo"=>"Flashpoint","img"=>"flashpoint.jpg","desc"=>"Barry Allen viaja al pasado para salvar a su madre, pero al despertar descubre que ha alterado la realidad, creando un mundo oscuro al borde de la guerra."],

["titulo"=>"Ms. Marvel","img"=>"msmarvel.jpg","desc"=>"Una adolescente fanática de los superhéroes descubre que tiene poderes polimórficos y debe equilibrar su vida familiar con su nuevo rol como heroína."],

["titulo"=>"My Hero Academia","img"=>"MHA.webp","desc"=>"En un mundo donde casi todos tienen superpoderes, un chico que nació sin ellos hereda el don del héroe más grande para estudiar en una academia de élite."],

["titulo"=>"Naruto","img"=>"Naruto.jpg","desc"=>"Un ninja marginado que alberga un demonio en su interior lucha por ganar el reconocimiento de su aldea y cumplir su sueño de convertirse en Hokage."],

["titulo"=>"One Piece","img"=>"Onepiece.jpg","desc"=>"Monkey D. Luffy y su tripulación navegan por mares peligrosos en busca del tesoro legendario para que él pueda convertirse en el próximo Rey de los Piratas."],

["titulo"=>"Secret Wars","img"=>"Secretwars.png","desc"=>"El multiverso colapsa y los restos de diferentes realidades se fusionan en 'Battleworld', un planeta regido por el puño de hierro del Doctor Doom. Heroes y villanos de todos los universos deben unirse para sobrevivir."],

["titulo"=>"Spider-verse","img"=>"Spiderverse.jpg","desc"=>"Varias versiones de Spider-Man de distintos universos deben unirse para evitar que una familia de vampiros interdimensionales los cace hasta la extinción."]

];

usort($comics, function($a, $b) {
    return strcmp($a['titulo'], $b['titulo']);
});
@endphp

<div class="row">

@foreach($comics as $comic)
<div class="col-md-3 mb-4">
    <div class="card h-100">
        <img src="{{ asset('images/' . $comic['img']) }}">
        <div class="card-body">
            <h5>{{ $comic['titulo'] }}</h5>
            <p>{{ $comic['desc'] }}</p>
        </div>
    </div>
</div>
@endforeach

</div>

@endsection