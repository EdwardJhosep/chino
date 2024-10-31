<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;

class GananciasController extends Controller
{
    public function index()
    {
        // Obtener las ganancias de productos
        $gananciasProductos = DB::table('venta_producto')->sum('total');

        // Obtener las ganancias de servicios
        $gananciasServicios = DB::table('venta_servicio')->sum('total');

        // Contar la cantidad de productos y servicios
        $cantidadProductos = DB::table('venta_producto')->count();
        $cantidadServicios = DB::table('venta_servicio')->count();

        // Calcular las ganancias totales
        $totalGanancias = $gananciasProductos + $gananciasServicios;

        // Pasar las variables a la vista
        return view('admin.ganancias', compact('gananciasProductos', 'gananciasServicios', 'totalGanancias', 'cantidadProductos', 'cantidadServicios'));
    }
}
