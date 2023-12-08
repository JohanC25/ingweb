<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        DB::table('equipo')->insert([
            [
                'tipo_equipo' => 'Laptop',
                'marca_equipo' => 'Lenovo',
                'modelo_equipo' => 'ThinkPad X1',
                'fecha_recepcion' => now(),
                'id_cliente' => 1 
            ],
            [
                'tipo_equipo' => 'Smartphone',
                'marca_equipo' => 'Samsung',
                'modelo_equipo' => 'Galaxy S10',
                'fecha_recepcion' => now(),
                'id_cliente' => 2 
            ],
            [
                'tipo_equipo' => 'Tablet',
                'marca_equipo' => 'Apple',
                'modelo_equipo' => 'iPad Pro',
                'fecha_recepcion' => now(),
                'id_cliente' => 3 
            ]
        ]);
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        //
    }
};
