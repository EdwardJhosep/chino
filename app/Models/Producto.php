<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Producto extends Model
{
    use HasFactory;

    // Especificar la tabla si el nombre no es plural
    protected $table = 'productos';

    // Especificar los campos que se pueden asignar masivamente
    protected $fillable = [
        'nombre',
        'categoria',
        'precio',
        'descripcion',
        'foto',
        'stock', // Agregar el campo stock
    ];

    // Si deseas ocultar algunos campos al convertir a un array o JSON
    protected $hidden = [
        // Ejemplo: 'created_at', 'updated_at'
    ];

    // Si deseas agregar accesores o mutadores, puedes hacerlo aquí
    // Ejemplo de un accesor para obtener el precio formateado
    public function getPrecioFormattedAttribute()
    {
        return number_format($this->precio, 2);
    }
}
