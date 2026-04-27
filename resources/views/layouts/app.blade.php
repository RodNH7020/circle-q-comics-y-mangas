<!DOCTYPE html>
<html>
<head>
<title>@yield('title')</title>

<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
<link href="https://fonts.googleapis.com/css2?family=Bangers&family=Roboto&display=swap" rel="stylesheet">
<meta name="viewport" content="width=device-width, initial-scale=1">

<style>
body {
    font-family: 'Roboto', sans-serif;
    margin: 0;
    padding-top: 80px;
    

    display: flex;
    flex-direction: column;
    min-height: 100vh;

    background-color: rgb(0, 0, 0); 
    background-image: 
        linear-gradient(to bottom, rgba(120, 0, 0, 0) 0%, rgb(0, 0, 0) 70%),
        url('/images/fondo-heroes.jpg.jpg');

    background-attachment: fixed;
    background-repeat: no-repeat;
    background-position: top center;
    background-size: 100% auto;
}

/* NAVBAR */
.navbar {
  position: fixed;
  top: 0;
  width: 100%;
  z-index: 1000;
  background-color: rgba(120,0,0,0.95);
}

.active-link {
  font-weight: bold;
  border-bottom: 2px solid white;
}

/* HERO */
.hero {
  padding-top: 60px;
  padding-bottom: 60px;
  text-shadow: 2px 2px 10px black;
}

h1, h2, h3, h4, h5, .comic-title {
    font-family: 'Bangers', cursive;
    letter-spacing: 1px;
    text-shadow: 2px 2px 5px black, 0 0 10px rgba(0, 0, 0, 0.5);
}

.card p {
    font-family: 'Roboto', sans-serif;
}

/* SEPARACIÓN */
.container {
  margin-bottom: 60px;
}

/* CAROUSEL */
.carousel-inner {
  border-radius: 20px;
  overflow: hidden;
}

.carousel-item img {
  width: 100%;
  height: auto;
}

/* CARDS */
.card {
  background-color: #111;
  color: white;
  border: none;
  transition: transform 0.3s;
}

.card:hover {
  transform: scale(1.05);
}

.card img {
  width: 100%;
  height: auto;
}

.fondo-texto {
    background-color: rgba(0, 0, 0, 0.9);
    color: #ffffff;
    padding: 20px;
    border-radius: 8px;
}


/* BOTON REDONDO */
.btn-round {
  border-radius: 50px;
  padding: 6px 18px;
  font-weight: bold;
}

.scroll-horizontal {
  display: flex;
  overflow: hidden;
  width: 100%;
}

.scroll-track {
  display: flex;
  width: max-content;
  animation: scrollX 20s linear infinite;
}

.scroll-horizontal .item {
  flex: 0 0 auto;
  width: 600px; 
  margin-right: 20px;
}

.scroll-horizontal img {
  width: 100%;
  height: 350px;
  object-fit: cover;
  border-radius: 10px;
}

/* ANIMACIÓN */
@keyframes scrollX {
  from { transform: translateX(0); }
  to { transform: translateX(-50%); }
}

footer {
    margin-top: auto;
}

.main-content {
    flex: 1; 
}
</style>
</head>

<body>

<nav class="navbar navbar-expand-lg navbar-dark px-3">
  
  <a class="navbar-brand" href="/home">
    <img src="/images/logo.png" style="height: 60px;">
  </a>

  <!-- BOTÓN HAMBURGUESA -->
  <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
    <span class="navbar-toggler-icon"></span>
  </button>

  <!-- CONTENIDO -->
  <div class="collapse navbar-collapse" id="navbarNav">
    <div class="ms-auto d-flex flex-column flex-lg-row gap-3">
  
      <a class="nav-link text-white {{ request()->is('quienes-somos') ? 'active-link' : '' }}" href="/quienes-somos">Quiénes somos</a>

      <a class="nav-link text-white {{ request()->is('comercializacion') ? 'active-link' : '' }}" href="/comercializacion">Comercialización</a>

      <a class="nav-link text-white {{ request()->is('informacion-de-contacto') ? 'active-link' : '' }}" href="/informacion-de-contacto">Información de Contactos</a>

      <a class="nav-link text-white {{ request()->is('catalogo') ? 'active-link' : '' }}" href="/catalogo">Catálogo</a>

      <a class="nav-link text-white {{ request()->is('terminos-y-usos') ? 'active-link' : '' }}" href="/terminos-y-usos">Términos y usos</a>

      <a class="nav-link text-white {{ request()->is('consultas') ? 'active-link' : '' }}" href="/consultas">Consultas</a>
    </div>
  </div>
</nav>

<div class="main-content">
  <div class="container">
    @yield('content')
  </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">

<footer class="mt-auto pt-5 pb-4" style="background-color: rgba(120, 0, 0, 0.9); color: white;">
  <div class="container">

    <div class="row">
      <!-- Logo -->
      <div class="col-md-3 mb-3">
        <a href="/home">
          <img src="/images/logo.png" style="height: 120px;margin-top: -30px;">
        </a>
      </div>

      <!-- Links -->
      <div class="col-md-3 mb-3">
        <a href="/quienes-somos" class="text-decoration-none text-white d-block mb-2">Quiénes somos</a>
        <a href="/comercializacion" class="text-decoration-none text-white d-block mb-2">Comercialización</a>
        <a href="/sucursal" class="text-decoration-none text-white d-block mb-2">Sucursales</a>

      </div>

      <!-- Contacto -->
      <div class="col-md-3 mb-3">
        <h5>Contactanos</h5>
        <ul class="list-unstyled">
          <li>
            <a href="https://wa.me/5493794026500" target="_blank" class="text-decoration-none text-white">
              3794026500
            </a>
          </li>
          <li class="mt-2">
            <a href="mailto:circleq@gmail.com" class="text-decoration-none text-white"> circleq@gmail.com

            </a>
          </li>
        </ul>
      </div>

      <!-- Redes -->
      <div class="col-md-3 mb-3 text-center">
        <h5>Seguinos</h5>
        <ul class="list-inline">
          <li class="list-inline-item">
            <a href="https://www.facebook.com/" target="_blank" class="text-white">
              <i class="bi bi-facebook"></i>
            </a>
          </li>
          <li class="list-inline-item">
            <a href="https://www.instagram.com/" target="_blank" class="text-white">
              <i class="bi bi-instagram"></i>
            </a>
          </li>
        </ul>
      </div>
    </div>

    <hr>

    <!-- Bottom -->
    <div class="text-center">
      <div class="d-flex justify-content-center">
        <a href="/terminos-y-usos" class="text-decoration-none text-white me-3">Términos y usos -</a>
        <a href="/politicas-de-privacidad" class="text-decoration-none text-white">Políticas de privacidad</a>
      </div>
      <p class="mt-2">&copy; Copyright 2026 ©Circleq</p>
    </div>

  </div>
</footer>

</body>
</html>