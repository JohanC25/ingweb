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
        DB::table('cliente')->insert([
            [
                'nombre' => 'Juan',
                'apellido' => 'Pérez',
                'correo' => 'juan.perez@example.com',
                'celular' => '1234567890',
                'direccion' => 'Jipijapa'
            ],
            [
                'nombre' => 'María',
                'apellido' => 'López',
                'correo' => 'maria.lopez@example.com',
                'celular' => '0987654321',
                'direccion' => 'Calderon'
            ],
            [
                'nombre' => 'Carlos',
                'apellido' => 'González',
                'correo' => 'carlos.gonzalez@example.com',
                'celular' => '1122334455',
                'direccion' => null
            ],
            [
                'nombre' => 'Mario',
                'apellido' => 'Agusto',
                'correo' => 'mario@hotmail.com',
                'celular' => '0998875678',
                'direccion' => null
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
