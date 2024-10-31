<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class VentaServicio extends Model
{
    use HasFactory;

    protected $table = 'venta_servicio'; // Nombre de la tabla

    protected $fillable = [
        'servicio_id', // ID del servicio vendido
        'cantidad', // Cantidad vendida
        'precio_unitario', // Precio por unidad
        'total', // Total de la venta
    ];

    // Relación con el modelo Servicio
    public function servicio()
    {
        return $this->belongsTo(Servicio::class);
    }
}
