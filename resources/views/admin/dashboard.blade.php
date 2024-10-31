<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard de Administrador</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <style>
        /* Estilo para garantizar que el gráfico se ajuste adecuadamente */
        #chartContainer {
            position: relative;
            width: 100%;
            height: 300px; /* Ajusta la altura según lo necesario */
            overflow: hidden;
        }
        canvas {
            width: 100% !important; /* Asegurarse de que el canvas ocupe el 100% del contenedor */
            height: auto !important; /* Ajustar la altura automáticamente */
        }
        .main-content {
            margin-left: 1rem; /* Ajustar el margen izquierdo según sea necesario */
            margin-right: 1rem; /* Ajustar el margen derecho para centrar */
        }
        @media (max-width: 768px) {
            .main-content {
                margin-left: 0.5rem;
                margin-right: 0.5rem;
            }
            #chartContainer {
                height: 200px; /* Altura del gráfico para pantallas pequeñas */
            }
        }
    </style>
</head>
<body class="bg-gray-100">
    <header class="bg-blue-800 text-white flex justify-between items-center px-5 py-4">
        <h1 class="text-2xl font-bold">Dashboard de Administrador</h1>
        <button id="menu-toggle" class="md:hidden focus:outline-none text-white">
            <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16"></path>
            </svg>
        </button>
    </header>
    <div class="flex">
        <nav id="menu" class="bg-white shadow-lg w-full md:w-64 h-screen overflow-y-auto p-5 fixed md:relative transform -translate-x-full md:translate-x-0 transition-transform duration-300 ease-in-out" style="z-index:9999;">
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

        <!-- Contenido del Dashboard -->
        <main class="flex-grow p-5 md:ml-64 mt-16 main-content">
            <div class="container mx-auto">
                <div class="grid grid-cols-1 md:grid-cols-2 gap-4 mb-4">
                    <div class="bg-white shadow-lg rounded-lg p-5">
                        <h2 class="text-lg font-semibold mb-3">Cantidad de Productos</h2>
                        <p class="text-4xl font-bold">{{ $cantidadProductos }}</p>
                    </div>
                    <div class="bg-white shadow-lg rounded-lg p-5">
                        <h2 class="text-lg font-semibold mb-3">Cantidad de Servicios</h2>
                        <p class="text-4xl font-bold">{{ $cantidadServicios }}</p>
                    </div>
                </div>

                <!-- Gráfico -->
                <div class="bg-white shadow-lg rounded-lg p-5 mt-4">
                    <h2 class="text-lg font-semibold mb-3">Distribución de Productos y Servicios</h2>
                    <div id="chartContainer">
                        <canvas id="myPieChart"></canvas>
                    </div>
                </div>
            </div>
        </main>
    </div>
    
    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <script>
        const menuToggle = document.getElementById('menu-toggle');
        const menu = document.getElementById('menu');

        menuToggle.addEventListener('click', () => {
            menu.classList.toggle('-translate-x-full');
        });

        const ctx = document.getElementById('myPieChart').getContext('2d');
        const myPieChart = new Chart(ctx, {
            type: 'pie',
            data: {
                labels: ['Productos', 'Servicios'],
                datasets: [{
                    data: [{{ $cantidadProductos }}, {{ $cantidadServicios }}],
                    backgroundColor: [
                        'rgba(75, 192, 192, 0.6)',
                        'rgba(153, 102, 255, 0.6)',
                    ],
                }]
            },
            options: {
                responsive: true,
                maintainAspectRatio: false,
            }
        });
    </script>
</body>
</html>
