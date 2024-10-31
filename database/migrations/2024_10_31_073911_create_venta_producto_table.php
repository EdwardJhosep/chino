<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateVentaProductoTable extends Migration
{
    public function up()
    {
        Schema::create('venta_producto', function (Blueprint $table) {
            $table->id(); // ID de la venta
            $table->foreignId('producto_id')->constrained('productos')->onDelete('cascade'); // Relación con productos
            $table->integer('cantidad'); // Cantidad del producto vendido
            $table->decimal('precio_unitario', 10, 2); // Precio unitario del producto
            $table->decimal('total', 10, 2); // Total de la venta
            $table->timestamps(); // Fechas de creación y actualización
        });
    }

    public function down()
    {
        Schema::dropIfExists('venta_producto');
    }
}

