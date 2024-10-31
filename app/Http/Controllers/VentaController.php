<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Servicio;
use App\Models\Producto;
use App\Models\VentaServicio;

class VentaController extends Controller
{
    public function index()
    {
        return view('admin.venta.index');
    }

    public function ventaservice()
    {
        $servicios = Servicio::all();

        return view('admin.services.venta',compact('servicios'));
    }
    public function ventaproduct()
    {
        $productos = Producto::all();
        return view('admin.products.venta', compact('productos'));
    }
}
