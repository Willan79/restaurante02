<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('carrito_items', function (Blueprint $table) {
            $table->id();
            $table->foreignId('carrito_id')->constrained('carritos')->onDelete('cascade'); // Relación con el carrito
            $table->foreignId('plato_id')->constrained('platos')->onDelete('cascade'); // Relación con los platos
            $table->integer('cantidad'); // Cantidad de cada plato
            $table->decimal('precio', 8, 2); // Precio del plato en ese momento
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('carrito_items');
    }
};
