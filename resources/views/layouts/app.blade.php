<!DOCTYPE html>
<html>
<head>
    <title>@yield('title')</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">

    <style>
        body {
            font-family: Arial;
            margin: 0;

            background-image: 
                linear-gradient(rgba(120,0,0,0.8), rgba(120,0,0,0.8)),
                 url('/images/fondo-heroes.jpg.jpg');
            background-size: cover;
            background-position: center;
        }

        .navbar {
            background-color: rgba(0,0,0,0.8);
        }
    </style>
</head>

<body>

    <nav class="navbar navbar-dark px-3">
       <a class="navbar-brand" href="/home">
    <img src="/images/logo.png" alt="Circle Q" style="height: 50px;">
</a>
        <a href="/home">Inicio</a>
        <a href="/quienes-somos">Quiénes somos</a>
        <a href="/comercializacion">Comercialización</a>
        <a href="/consultas">Consultas</a>
        <a href="/contacto">Contacto</a>
    </nav>

    <div class="container mt-4">
        @yield('content')
    </div>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>


<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
<footer class="mt-auto pt-5 pb-4" style="background-color: rgba(120, 0, 0, 0.9); color: white;">
  <div class="container">
    <div class="row">
      <div class="col-md-4 mb-3">
        <h5>About Us</h5>
        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nullam ac ante mollis quam tristique convallis.</p>
      </div>

      <div class="col-md-4 mb-3">
        <h5>Contactanos </h5>
        <ul class="list-unstyled">
          <li>
            <a href="https://wa.me/5493794026500" target="_blank" rel="noopener noreferrer" class="text-decoration-none text-white">
                3794026500
            </a>
        </li>

        <li class="mt-2">
            <a href="mailto:loourdeeselizabethmonzon@gmail.com" class="text-decoration-none text-white">
                circleq@gmail.com
            </a>
        </li>
        </ul>
    
      </div>
      <div class="col-md-4 mb-3">
        <h5>Seguinos </h5>
        <ul class="list-inline social-icons">
  <li class="list-inline-item">
    <a href="https://www.facebook.com/" target="_blank" class="text-white">
      <i class="bi bi-facebook"></i>
    </a>
  </li>

  <li class="list-inline-item">
    <a href="https://www.instagram.com/boludeco_" target="_blank" class="text-white">
      <i class="bi bi-instagram"></i>
    </a>
  </li>
</ul>
      </div>
    </div>
    <hr class="mb-4">
    <div class="row">
      <div class="col-md-12 text-center">
        <p>&copy; Copyright 2026 ©Circleq . Todos los derechos reservados </p>
      </div>
    </div>
  </div>
</footer>


</body>
</html>