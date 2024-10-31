<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard de Administrador</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
</head>
<body class="bg-gray-100">
    <header class="bg-blue-800 text-white flex justify-between items-center px-5 py-4">
        <h1 class="text-2xl font-bold">Agregar Productos</h1>
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
        <div class="flex-grow p-5">
            <h2 class="mb-4 text-2xl font-semibold">Agregar Nuevo Producto</h2>

            <!-- Mostrar mensajes de éxito o error -->
            @if(session('success'))
                <div class="bg-green-100 border-l-4 border-green-500 text-green-700 p-4 mb-4" role="alert">
                    <p>{{ session('success') }}</p>
                </div>
            @endif

            @if($errors->any())
                <div class="bg-red-100 border-l-4 border-red-500 text-red-700 p-4 mb-4" role="alert">
                    <ul>
                        @foreach($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            <form action="{{ route('admin.products.store') }}" method="POST" enctype="multipart/form-data" class="bg-white shadow-md rounded-lg p-6">
                @csrf

                <!-- Nombre -->
                <div class="form-group">
                    <label for="nombre" class="block text-gray-700">Nombre del Producto</label>
                    <input type="text" class="form-control mt-1 border rounded-md focus:outline-none focus:ring focus:ring-blue-300" id="nombre" name="nombre" required>
                </div>

                <!-- Categoría -->
                <div class="form-group">
                    <label for="categoria" class="block text-gray-700">Categoría</label>
                    <input type="text" class="form-control mt-1 border rounded-md focus:outline-none focus:ring focus:ring-blue-300" id="categoria" name="categoria" required>
                </div>

                <!-- Foto -->
                <div class="form-group">
                    <label for="foto" class="block text-gray-700">Foto</label>
                    <input type="file" class="form-control-file mt-1" id="foto" name="foto" accept="image/*" required>
                </div>

                <!-- Precio -->
                <div class="form-group">
                    <label for="precio" class="block text-gray-700">Precio</label>
                    <input type="number" class="form-control mt-1 border rounded-md focus:outline-none focus:ring focus:ring-blue-300" id="precio" name="precio" step="0.01" required>
                </div>
                <div class="form-group">
                <label for="stock">Stock</label>
                <input type="number" name="stock" id="stock" class="form-control" required min="1">
                </div>
                <!-- Descripción -->
                <div class="form-group">
                    <label for="descripcion" class="block text-gray-700">Descripción</label>
                    <textarea class="form-control mt-1 border rounded-md focus:outline-none focus:ring focus:ring-blue-300" id="descripcion" name="descripcion" rows="4" required></textarea>
                </div>

                <!-- Botón de envío -->
                <button type="submit" class="w-full bg-blue-600 text-white font-bold py-2 rounded-lg hover:bg-blue-700 transition duration-200">Agregar Producto</button>
            </form>
        </div>
    </div>
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
    </script>
</body>
</html>
