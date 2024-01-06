<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
    {
        Schema::table('equipo', function (Blueprint $table) {
            $table->decimal('monto_pagar', 8, 2)->nullable();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down()
    {
        Schema::table('equipo', function (Blueprint $table) {
            // Eliminar la columna en caso de rollback
            $table->dropColumn('monto_pagar');
        });
    }
};
