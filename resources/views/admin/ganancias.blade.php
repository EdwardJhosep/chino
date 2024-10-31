<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard de Administrador - Ganancias</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <style>
        /* Ajusta el tamaño del canvas del gráfico */
        #gananciasChart {
            width: 100% !important; /* 100% del ancho del contenedor */
            height: 400px !important; /* Ajusta la altura */
        }
        @media (max-width: 768px) {
            #menu {
                position: absolute;
                width: 100%; /* Asegura que el menú ocupe el 100% del ancho en móviles */
            }
        }
    </style>
</head>
<body class="bg-gray-100">
    <header class="bg-blue-800 text-white flex justify-between items-center px-5 py-4">
        <h1 class="text-2xl font-bold">Ver Ganancia</h1>
        <button id="menu-toggle" class="md:hidden focus:outline-none text-white">
            <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16"></path>
            </svg>
        </button>
    </header>
    <div class="flex">
        <nav id="menu" class="bg-white shadow-lg w-full md:w-64 h-screen overflow-y-auto p-5 fixed md:relative transform -translate-x-full md:translate-x-0 transition-transform duration-300 ease-in-out">
            <h2 class="text-2xl font-semibold text-center text-blue-800 mb-5">Menú de Administración</h2>
            <ul class="space-y-2">
                <li class="mb-1">
                    <a href="{{ route('admin.dashboard') }}" class="flex items-center text-gray-700 hover:bg-blue-100 rounded-lg px-3 py-2 transition duration-200">
                        <svg class="w-5 h-5 mr-2 text-blue-500" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 7h18M3 12h18m-6 5h6"></path>
                        </svg>
                        Inicio
                    </a>
                </li>
                <li class="mb-1">
                    <a href="#productosSubmenu" data-toggle="collapse" class="flex items-center text-gray-700 hover:bg-blue-100 rounded-lg px-3 py-2 transition duration-200">
                        <svg class="w-5 h-5 mr-2 text-blue-500" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16"></path>
                        </svg>
                        Gestión de Productos
                    </a>
                    <ul class="collapse bg-blue-50 rounded-lg p-3" id="productosSubmenu">
                        <li class="ml-8 mt-2">
                            <a href="{{ route('admin.products.create') }}" class="text-gray-600 hover:text-blue-600 transition duration-200">Agregar Producto</a>
                        </li>
                        <li class="ml-8 mt-2">
                            <a href="{{ route('admin.products.index') }}" class="text-gray-600 hover:text-blue-600 transition duration-200">Ver Productos</a>
                        </li>
                        <li class="ml-8 mt-2">
                            <a href="{{ route('admin.products.venta') }}" class="text-gray-600 hover:text-blue-600 transition duration-200">Crear Venta Producto</a>
                        </li>
                    </ul>
                </li>
                <li class="mb-1">
                    <a href="#serviciosSubmenu" data-toggle="collapse" class="flex items-center text-gray-700 hover:bg-blue-100 rounded-lg px-3 py-2 transition duration-200">
                        <svg class="w-5 h-5 mr-2 text-blue-500" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16"></path>
                        </svg>
                        Gestión de Servicios
                    </a>
                    <ul class="collapse bg-green-50 rounded-lg p-3" id="serviciosSubmenu">
                        <li class="ml-8 mt-2">
                            <a href="{{ route('admin.services.create') }}" class="text-gray-600 hover:text-blue-600 transition duration-200">Agregar Servicio</a>
                        </li>
                        <li class="ml-8 mt-2">
                            <a href="{{ route('admin.services.index') }}" class="text-gray-600 hover:text-blue-600 transition duration-200">Ver Servicios</a>
                        </li>
                        <li class="ml-8 mt-2">
                            <a href="{{ route('admin.services.venta') }}" class="text-gray-600 hover:text-blue-600 transition duration-200">Crear Venta Servicio</a>
                        </li>
                    </ul>
                </li>
                <li class="mb-1">
                    <a href="{{ route('admin.ganancias') }}" class="flex items-center text-gray-700 hover:bg-blue-100 rounded-lg px-3 py-2 transition duration-200">
                        <svg class="w-5 h-5 mr-2 text-blue-500" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4"></path>
                        </svg>
                        Ver Ganancias
                    </a>
                </li>
                <li class="mt-5">
                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                        @csrf
                    </form>
                    <button type="button" onclick="event.preventDefault(); document.getElementById('logout-form').submit();" class="w-full text-left text-red-700 hover:bg-red-100 rounded-lg px-3 py-2 transition duration-200">
                        Cerrar sesión
                    </button>
                </li>
            </ul>
        </nav>

        <div class="flex-grow p-6 ml-0 md:ml-64 transition-all duration-300">
            <h2 class="text-2xl font-bold mb-4">Ganancias Totales</h2>
            <div class="bg-green-200 shadow-md rounded-lg p-4 mb-4">
                <h3 class="text-xl font-semibold">Resumen de Ganancias</h3>
                <p><strong>Ganancias de Productos:</strong> S/. {{ number_format($gananciasProductos, 2) }}</p>
                <p><strong>Ganancias de Servicios:</strong> S/. {{ number_format($gananciasServicios, 2) }}</p>
                <p class="text-lg font-bold"><strong>Total de Ganancias:</strong> S/. {{ number_format($totalGanancias, 2) }}</p>
            </div>

            <!-- Tabla de Detalles de Ganancias -->
            <div class="bg-white shadow-md rounded-lg p-4">
                <h3 class="text-xl font-semibold">Detalles de Ganancias</h3>
                <table class="table-auto w-full mt-4">
                    <thead>
                        <tr class="bg-gray-200">
                            <th class="px-4 py-2">Tipo</th>
                            <th class="px-4 py-2">Cantidad</th>
                            <th class="px-4 py-2">Ganancia (S/.)</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td class="border px-4 py-2">Productos</td>
                            <td class="border px-4 py-2">{{ $cantidadProductos }}</td>
                            <td class="border px-4 py-2">{{ number_format($gananciasProductos, 2) }}</td>
                        </tr>
                        <tr>
                            <td class="border px-4 py-2">Servicios</td>
                            <td class="border px-4 py-2">{{ $cantidadServicios }}</td>
                            <td class="border px-4 py-2">{{ number_format($gananciasServicios, 2) }}</td>
                        </tr>
                    </tbody>
                </table>
            </div>

            <!-- Gráfico de Ganancias -->
            <div class="mt-4">
                <canvas id="gananciasChart"></canvas>
            </div>
        </div>
    </div>

    <script>
        // Lógica para el gráfico de ganancias
        var ctx = document.getElementById('gananciasChart').getContext('2d');
        var gananciasChart = new Chart(ctx, {
            type: 'bar',
            data: {
                labels: ['Productos', 'Servicios'],
                datasets: [{
                    label: 'Ganancias',
                    data: [{{ $gananciasProductos }}, {{ $gananciasServicios }}],
                    backgroundColor: [
                        'rgba(75, 192, 192, 0.6)',
                        'rgba(255, 99, 132, 0.6)',
                    ],
                    borderColor: [
                        'rgba(75, 192, 192, 1)',
                        'rgba(255, 99, 132, 1)',
                    ],
                    borderWidth: 1
                }]
            },
            options: {
                scales: {
                    y: {
                        beginAtZero: true
                    }
                }
            }
        });
    </script>
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
