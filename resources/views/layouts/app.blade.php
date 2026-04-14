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
</body>
</html>