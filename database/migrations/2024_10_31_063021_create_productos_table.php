<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('productos', function (Blueprint $table) {
            $table->id();                                   // Clave primaria autoincremental
            $table->string('nombre');                       // Nombre del producto
            $table->string('categoria');                    // Categoría del producto
            $table->decimal('precio', 8, 2);                // Precio del producto
            $table->text('descripcion')->nullable();       // Descripción del producto
            $table->integer('stock')->default(0);          // Stock del producto (por defecto 0)
            $table->string('foto')->nullable();             // URL de la foto del producto
            $table->timestamps();                           // Marca de tiempo
        });
    }

    public function down()
    {
        Schema::dropIfExists('productos');                // Eliminar la tabla si existe
    }
};
