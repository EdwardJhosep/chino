<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dr. Computec - Sistema de Gestión de Ventas</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>
<body class="bg-light">

<div class="container d-flex flex-column justify-content-center align-items-center min-vh-100">
    <div class="jumbotron text-center bg-info text-white w-100" style="max-width: 600px;">
        <h1 class="display-4">Bienvenido al Sistema de Gestión de Ventas</h1>
        <p class="lead">Dr. Computec se especializa en la administración eficiente de ventas de productos y servicios.</p>
        <hr class="my-4 bg-light">
        <p>Optimiza tus procesos de venta y mejora la gestión de tu negocio con nuestras herramientas.</p>
        <a href="{{ route('login') }}" class="btn btn-warning btn-lg">Comenzar</a>
    </div>

    <div class="text-center mt-4">
        <p class="lead">Para más información, contáctanos al <strong>987654321</strong>.</p>
    </div>
</div>

<!-- Pie de página -->
<footer class="text-center mt-5 mb-3 bg-dark text-white py-3">
    <p>&copy; 2024 Dr. Computec. Todos los derechos reservados.</p>
</footer>

<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
