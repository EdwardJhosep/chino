<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateVentaServicioTable extends Migration
{
    public function up()
    {
        Schema::create('venta_servicio', function (Blueprint $table) {
            $table->id(); // ID de la venta
            $table->foreignId('servicio_id')->constrained('servicios')->onDelete('cascade'); // Relación con servicios
            $table->integer('cantidad'); // Cantidad del servicio vendido
            $table->decimal('precio_unitario', 10, 2); // Precio unitario del servicio
            $table->decimal('total', 10, 2); // Total de la venta
            $table->timestamps(); // Fechas de creación y actualización
        });
    }

    public function down()
    {
        Schema::dropIfExists('venta_servicio');
    }
}
