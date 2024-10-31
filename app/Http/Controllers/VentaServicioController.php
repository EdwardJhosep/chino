<?php

namespace App\Http\Controllers;

use App\Models\VentaServicio;
use Illuminate\Http\Request;

class VentaServicioController extends Controller
{
    public function store(Request $request)
    {
        // Validar la entrada
        dd("gaa");
        $validated = $request->validate([
            'servicio_id' => 'required|exists:servicios,id',
            'cantidad' => 'required|integer|min:1',
            'precio_unitario' => 'required|numeric|min:0',
        ]);
    
        $total = $validated['cantidad'] * $validated['precio_unitario'];
    
        try {
            // Crear la venta
            VentaServicio::create([
                'servicio_id' => $validated['servicio_id'],
                'cantidad' => $validated['cantidad'],
                'precio_unitario' => $validated['precio_unitario'],
                'total' => $total,
            ]);
    
            return redirect()->route('admin.services.venta')->with('success', 'Venta registrada con éxito.');
        } catch (\Exception $e) {
            // Manejo del error
            return redirect()->route('admin.services.venta')
                ->with('error', 'Ocurrió un error al registrar la venta: ' . $e->getMessage());
        }
    }
    
}
