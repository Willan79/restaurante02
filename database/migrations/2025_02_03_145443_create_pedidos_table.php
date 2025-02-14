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
        Schema::create('pedidos', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('user_id'); // ID del usuario que realiza el pedido
            $table->decimal('total', 10, 2); // Total del pedido
            $table->string('estado')->default('pendiente'); // Estado del pedido (pendiente, completado, cancelado, etc.)
            $table->string('metodo_pago'); // Método de pago (efectivo, Nequi.)
            $table->string('direccion_envio'); // Dirección de envío
            $table->timestamps();

            // Relación con la tabla users
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('pedidos');
    }
};
