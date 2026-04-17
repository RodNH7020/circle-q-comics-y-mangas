<!DOCTYPE html>
<html>
<head>
    <title>@yield('title')</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">

    <style>
        body {
    font-family: Arial;
    margin: 0;
    
    /* 1. Color de fondo sólido que recibirá el desvanecimiento */
    background-color: rgb(0, 0, 0); 

    background-image: 
        /* 2. El degradado: De transparente arriba a rojo TOTAL al final */
        linear-gradient(to bottom, rgba(120, 0, 0, 0) 0%, rgb(0, 0, 0) 70%),
        url('/images/fondo-heroes.jpg.jpg');

    /* 3. Mantiene la imagen quieta al scrollear */
    background-attachment: fixed;

    /* 4. Evita repetición y centra */
    background-repeat: no-repeat;
    background-position: top center;

    /* 5. Ajusta el ancho pero mantiene proporción */
    background-size: 100% auto;
}

        .navbar {
            background-color: rgba(120,0,0,0.9);
        }

        .carousel img {
          height: 600px;
          object-fit: contain;
        }

        .card {
        background-color: #111;
        color: white;
        border: none;
      }

        .card img {
          height: 350px;
          object-fit: contain;
          background-color: black;
        }

        .card {
    transition: transform 0.3s;
      }

       .card:hover {
    transform: scale(1.05);
      }
    </style>
</head>

<body>

    <nav class="navbar navbar-dark px-3">
       <a class="navbar-brand" href="/home">
    <img src="/images/logo.png" alt="Circle Q" style="height: 50px;">
</a>
        <a href="/quienes-somos">Quiénes somos</a>
        <a href="/comercializacion">Comercialización</a>
        <a href="/contacto">Informacion de Contactos</a>
        <a href="/consultas">Consultas</a>
    </nav>

    <div class="container mt-4">
        @yield('content')
    </div>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>




<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
<footer class="mt-auto pt-5 pb-4" style="background-color: rgba(120, 0, 0, 0.9); color: white;">
  <div class="container">
    

  <div class="row">
      <div class="col-md-3 mb-3">
        <a href="/home">
         <img src="/images/logo.png" alt="Circle Q" style="height: 120px;margin-top: -30px;">
         </a>
      </div>

       
   <div class="col-md-3 mb-3">
    <a href="/quienes-somos" class="text-decoration-none text-white d-block mb-2">Quiénes somos</a>
    <a href="/comercializacion" class="text-decoration-none text-white d-block mb-2">Comercialización</a>
    <a href="/contacto" class="text-decoration-none text-white d-block mb-2">Contactos</a>
    <a href="/sucursal" class="text-decoration-none text-white d-block mb-2">Sucursales</a>
</div>



      <div class="col-md-3 mb-3">
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


      <div class="col-md-3 mb-3">
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