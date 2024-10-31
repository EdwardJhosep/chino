<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens; // Importa el trait

class User extends Authenticatable
{
    use HasFactory, Notifiable, HasApiTokens; // Añade HasApiTokens

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'dni', // Cambiado de 'email' a 'dni'
        'password',
        'permisos', // Agrega el campo 'permisos'
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @return array<string, string>
     */
    protected $casts = [
        'password' => 'hashed',
        'permisos' => 'array', // Asegúrate de que 'permisos' se maneje como un arreglo
    ];

    // Método para verificar si el usuario tiene un permiso específico
// Método para verificar si el usuario tiene un permiso específico
public function hasPermission($permission)
{
    // Asegúrate de que permisos es un array
    $permisos = json_decode($this->permisos, true); // Decodifica el JSON a un array

    return in_array($permission, $permisos);
}

}
