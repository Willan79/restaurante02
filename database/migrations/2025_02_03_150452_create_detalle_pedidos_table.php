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
        Schema::create('detalle_pedidos', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('pedido_id'); // ID del pedido
            $table->unsignedBigInteger('plato_id'); // ID del plato
            $table->integer('cantidad'); // Cantidad de platos
            $table->decimal('precio', 10, 2); // Precio unitario del plato
            $table->timestamps();

            // Relación con la tabla pedidos
            $table->foreign('pedido_id')->references('id')->on('pedidos')->onDelete('cascade');

            // Relación con la tabla platos
            $table->foreign('plato_id')->references('id')->on('platos')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('detalle_pedidos');
    }
};
