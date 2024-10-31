<?php


use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('servicios', function (Blueprint $table) {
            $table->id();
            $table->string('nombre');                // Nombre del servicio
            $table->string('categoria');             // Categoría del servicio
            $table->string('foto')->nullable();      // URL de la foto
            $table->decimal('precio', 8, 2);         // Precio del servicio
            $table->text('descripcion')->nullable(); // Descripción del servicio
            $table->timestamps();                    // Marca de tiempo
        });
    }

    public function down()
    {
        Schema::dropIfExists('servicios');
    }
};
