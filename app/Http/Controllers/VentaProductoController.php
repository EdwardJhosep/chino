<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\VentaProducto;
use App\Models\Producto;

class VentaProductoController extends Controller
{
    public function store(Request $request)
    {
        // Validar la entrada
        $validated = $request->validate([
            'producto_id' => 'required|exists:productos,id',
            'cantidad' => 'required|integer|min:1',
            'precio_unitario' => 'required|numeric|min:0',
        ]);

        // Calcular el total de la venta
        $total = $validated['cantidad'] * $validated['precio_unitario'];

        try {
            // Iniciar transacción para asegurar consistencia de datos
            \DB::beginTransaction();

            // Crear la venta del producto
            VentaProducto::create([
                'producto_id' => $validated['producto_id'],
                'cantidad' => $validated['cantidad'],
                'precio_unitario' => $validated['precio_unitario'],
                'total' => $total,
            ]);

            // Obtener el producto y descontar el stock
            $producto = Producto::find($validated['producto_id']);
            if ($producto->stock < $validated['cantidad']) {
                throw new \Exception('Stock insuficiente para completar la venta.');
            }

            $producto->stock -= $validated['cantidad'];
            $producto->save();

            // Confirmar la transacción
            \DB::commit();

            return redirect()->route('admin.products.venta')->with('success', 'Venta registrada con éxito y stock actualizado.');
        } catch (\Exception $e) {
            // En caso de error, revertir la transacción
            \DB::rollBack();

            return redirect()->route('admin.products.venta')
                ->with('error', 'Ocurrió un error al registrar la venta: ' . $e->getMessage());
        }
    }
}
