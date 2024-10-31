<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Producto; // Asegúrate de que este modelo existe
use App\Models\Servicio; // Asegúrate de que este modelo existe

class DashboardController extends Controller
{
    public function index(Request $request)
    {
        // Obtener la cantidad de productos y servicios
        $cantidadProductos = Producto::count(); // Contar los productos
        $cantidadServicios = Servicio::count(); // Contar los servicios

        return view('admin.dashboard', compact('cantidadProductos', 'cantidadServicios'));
    }
}
