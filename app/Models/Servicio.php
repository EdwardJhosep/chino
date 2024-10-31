<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Servicio extends Model
{
    use HasFactory;

    // Nombre de la tabla
    protected $table = 'servicios';

    // Campos permitidos para asignación masiva
    protected $fillable = [
        'nombre',
        'categoria',
        'foto',
        'precio',
        'descripcion',
    ];
}
