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
            'nombre' => 'Lucas',
            'apellido' => 'Ceron',
            'correo' => 'pepe@hotmail.com',
            'celular' => '1122334455',
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
