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
        <h1 class="text-2xl font-bold">Crear Venta Servicios</h1>
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
        
        <div class="container mx-auto mt-5">
            <div class="text-center mb-4">
                <h1 class="text-4xl font-extrabold text-gradient bg-gradient-to-r from-green-400 to-blue-500 bg-clip-text text-transparent">Buscar Servicios</h1>
            </div>
            <div class="mb-4">
                <input type="text" id="service-search" class="form-control" placeholder="Buscar servicios..." aria-label="Buscar servicios">
            </div>
            <div class="text-center mb-4">
                <h1 class="text-4xl font-extrabold text-gradient bg-gradient-to-r from-blue-500 to-purple-600 bg-clip-text text-transparent">Servicios Disponibles</h1>
            </div>
            @if(session('success'))
               <div class="alert alert-success">
            {{ session('success') }}
            </div>
            @endif

            @if(session('error'))
             <div class="alert alert-danger">
              {{ session('error') }}
            </div>
            @endif

            <div class="row" id="service-list">
                @foreach ($servicios as $servicio)
                    <div class="col-md-3 col-sm-6 mb-4 service-item">
                        <div class="card h-100 shadow-lg hover:shadow-xl transition-shadow duration-300">
                            <img src="{{ asset('storage/' . $servicio->foto) }}" class="card-img-top rounded" alt="{{ $servicio->nombre }}">
                            <div class="card-body">
                                <h5 class="card-title font-semibold text-lg">{{ $servicio->nombre }}</h5>
                                <h6 class="card-subtitle mb-2 text-muted">Categoría: {{ $servicio->categoria }}</h6>
                                <p class="card-text">Descripción: {{ $servicio->descripcion }}</p>
                                <p class="font-weight-bold text-lg">Precio: S/{{ $servicio->precio }}</p>
                                <button class="btn btn-primary mt-3" data-toggle="modal" data-target="#ventaModal" data-nombre="{{ $servicio->nombre }}" data-precio="{{ $servicio->precio }}" data-id="{{ $servicio->id }}">Crear Venta</button>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </div>

    <!-- Modal para crear venta -->
    <div class="modal fade" id="ventaModal" tabindex="-1" role="dialog" aria-labelledby="ventaModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="ventaModalLabel">Crear Venta</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form action="{{ route('admin.ventas.servicios.store') }}" method="POST">
                    @csrf
                    <div class="modal-body">
                        <input type="hidden" name="servicio_id" id="servicio_id">
                        <div class="form-group">
                            <label for="cantidad">Cantidad</label>
                            <input type="number" class="form-control" name="cantidad" id="cantidad" required min="1" value="1">
                        </div>
                        <div class="form-group">
                            <label for="precio_unitario">Precio Unitario</label>
                            <input type="text" class="form-control" name="precio_unitario" id="precio_unitario" readonly>
                        </div>
                        <div class="form-group">
                            <label for="total">Total</label>
                            <input type="text" class="form-control" name="total" id="total" readonly>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
                        <button type="submit" class="btn btn-primary">Guardar Venta</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <script>
        // Toggle de menú en móvil
        const menuToggle = document.getElementById('menu-toggle');
        const menu = document.getElementById('menu');

        menuToggle.addEventListener('click', () => {
            menu.classList.toggle('-translate-x-full');
        });
         // Búsqueda en tiempo real
         $(document).ready(function() {
            $('#service-search').on('keyup', function() {
                let searchValue = $(this).val().toLowerCase();
                $('#service-list .service-item').filter(function() {
                    $(this).toggle($(this).text().toLowerCase().indexOf(searchValue) > -1);
                });
            });
        });

        // Carga de datos en el modal
        $('#ventaModal').on('show.bs.modal', function (event) {
            const button = $(event.relatedTarget);
            const servicioNombre = button.data('nombre');
            const servicioPrecio = button.data('precio');
            const servicioId = button.data('id');

            const modal = $(this);
            modal.find('.modal-title').text('Crear Venta de ' + servicioNombre);
            modal.find('#servicio_id').val(servicioId);
            modal.find('#precio_unitario').val(servicioPrecio);
            modal.find('#total').val(servicioPrecio); // Inicialmente el total es igual al precio unitario

            // Actualiza el total al cambiar la cantidad
            $('#cantidad').on('input', function () {
                const cantidad = $(this).val();
                const total = cantidad * servicioPrecio;
                modal.find('#total').val(total.toFixed(2));
            });
        });
    </script>
</body>
</html>
