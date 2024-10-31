<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class VentaProducto extends Model
{
    use HasFactory;

    protected $table = 'venta_producto'; // Nombre de la tabla

    protected $fillable = [
        'producto_id', // ID del producto vendido
        'cantidad', // Cantidad vendida
        'precio_unitario', // Precio por unidad
        'total', // Total de la venta
    ];

    // Relación con el modelo Producto
    public function producto()
    {
        return $this->belongsTo(Producto::class);
    }
}
