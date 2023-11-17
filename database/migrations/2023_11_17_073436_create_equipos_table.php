<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('equipo', function (Blueprint $table) {
            $table->id();
            $table->string('tipo_equipo');
            $table->string('marca_equipo');
            $table->string('modelo_equipo');
            $table->date('fecha_recepcion');
            $table->date('fecha_entrega')->nullable();
            $table->date('fecha_retiro')->nullable();
            $table->boolean('equipo_retirado')->default(false);
            $table->unsignedBigInteger('id_cliente');
            $table->decimal('multa', 8, 2)->nullable();

            // Establece la relación con la tabla 'clientes'
            $table->foreign('id_cliente')->references('id')->on('cliente');

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('equipo');
    }
};
