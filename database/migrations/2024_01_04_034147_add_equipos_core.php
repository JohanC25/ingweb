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
            'tipo_equipo' => 'Laptop',
            'marca_equipo' => 'Dell',
            'modelo_equipo' => 'XPS 15',
            'fecha_recepcion' => '2023-02-01',
            'fecha_entrega' => '2023-02-10',
            'fecha_retiro' => null,
            'equipo_retirado' => false,
            'id_cliente' => 1,
            'multa' => null,
            'monto_pagar' => 1000.00
        ]);

        DB::table('equipo')->insert([
            'tipo_equipo' => 'Desktop',
            'marca_equipo' => 'HP',
            'modelo_equipo' => 'Pavilion',
            'fecha_recepcion' => '2023-03-03',
            'fecha_entrega' => '2023-03-13',
            'fecha_retiro' => null,
            'equipo_retirado' => false,
            'id_cliente' => 2,
            'multa' => null,
            'monto_pagar' => 1200.00
        ]);

        DB::table('equipo')->insert([
            'tipo_equipo' => 'Tablet',
            'marca_equipo' => 'Samsung',
            'modelo_equipo' => 'Galaxy Tab',
            'fecha_recepcion' => '2023-04-05',
            'fecha_entrega' => '2023-04-15',
            'fecha_retiro' => null,
            'equipo_retirado' => false,
            'id_cliente' => 3,
            'multa' => null,
            'monto_pagar' => 800.00
        ]);

        DB::table('equipo')->insert([
            'tipo_equipo' => 'Smartphone',
            'marca_equipo' => 'Apple',
            'modelo_equipo' => 'iPhone 13',
            'fecha_recepcion' => '2023-05-07',
            'fecha_entrega' => '2023-05-17',
            'fecha_retiro' => null,
            'equipo_retirado' => false,
            'id_cliente' => 4,
            'multa' => null,
            'monto_pagar' => 900.00
        ]);

        DB::table('equipo')->insert([
            'tipo_equipo' => 'Monitor',
            'marca_equipo' => 'LG',
            'modelo_equipo' => 'UltraFine',
            'fecha_recepcion' => '2023-06-09',
            'fecha_entrega' => '2023-06-19',
            'fecha_retiro' => null,
            'equipo_retirado' => false,
            'id_cliente' => 1,
            'multa' => null,
            'monto_pagar' => 700.00
        ]);

        DB::table('equipo')->insert([
            'tipo_equipo' => 'Laptop',
            'marca_equipo' => 'Asus',
            'modelo_equipo' => 'ZenBook',
            'fecha_recepcion' => '2023-07-02',
            'fecha_entrega' => '2023-07-12',
            'fecha_retiro' => null,
            'equipo_retirado' => false,
            'id_cliente' => 2,
            'multa' => 250.00,
            'monto_pagar' => 1000.00
        ]);

        DB::table('equipo')->insert([
            'tipo_equipo' => 'Desktop',
            'marca_equipo' => 'Acer',
            'modelo_equipo' => 'Aspire',
            'fecha_recepcion' => '2023-08-04',
            'fecha_entrega' => '2023-08-14',
            'fecha_retiro' => null,
            'equipo_retirado' => false,
            'id_cliente' => 3,
            'multa' => 300.00,
            'monto_pagar' => 1200.00
        ]);

        DB::table('equipo')->insert([
            'tipo_equipo' => 'Tablet',
            'marca_equipo' => 'Microsoft',
            'modelo_equipo' => 'Surface Pro',
            'fecha_recepcion' => '2023-09-06',
            'fecha_entrega' => '2023-09-16',
            'fecha_retiro' => null,
            'equipo_retirado' => false,
            'id_cliente' => 4,
            'multa' => 200.00,
            'monto_pagar' => 800.00
        ]);

        DB::table('equipo')->insert([
            'tipo_equipo' => 'Smartphone',
            'marca_equipo' => 'Google',
            'modelo_equipo' => 'Pixel 6',
            'fecha_recepcion' => '2023-10-08',
            'fecha_entrega' => '2023-10-18',
            'fecha_retiro' => null,
            'equipo_retirado' => false,
            'id_cliente' => 1,
            'multa' => 225.00,
            'monto_pagar' => 900.00
        ]);

        DB::table('equipo')->insert([
            'tipo_equipo' => 'Monitor',
            'marca_equipo' => 'Dell',
            'modelo_equipo' => 'Alienware',
            'fecha_recepcion' => '2023-11-10',
            'fecha_entrega' => '2023-11-20',
            'fecha_retiro' => null,
            'equipo_retirado' => false,
            'id_cliente' => 2,
            'multa' => 175.00,
            'monto_pagar' => 700.00
        ]);

        DB::table('equipo')->insert([
            'tipo_equipo' => 'Consola',
            'marca_equipo' => 'Sony',
            'modelo_equipo' => 'PlayStation 5',
            'fecha_recepcion' => '2023-12-01',
            'fecha_entrega' => '2023-12-11',
            'fecha_retiro' => null,
            'equipo_retirado' => false,
            'id_cliente' => 3,
            'multa' => 300.00,
            'monto_pagar' => 1200.00
        ]);

        DB::table('equipo')->insert([
            'tipo_equipo' => 'Cámara',
            'marca_equipo' => 'Canon',
            'modelo_equipo' => 'EOS R5',
            'fecha_recepcion' => '2024-02-03',
            'fecha_entrega' => '2024-02-13',
            'fecha_retiro' => null,
            'equipo_retirado' => false,
            'id_cliente' => 4,
            'multa' => 400.00,
            'monto_pagar' => 1600.00
        ]);

        DB::table('equipo')->insert([
            'tipo_equipo' => 'Impresora',
            'marca_equipo' => 'Epson',
            'modelo_equipo' => 'EcoTank L3150',
            'fecha_recepcion' => '2024-02-05',
            'fecha_entrega' => '2024-02-15',
            'fecha_retiro' => null,
            'equipo_retirado' => false,
            'id_cliente' => 1,
            'multa' => 100.00,
            'monto_pagar' => 400.00
        ]);

        DB::table('equipo')->insert([
            'tipo_equipo' => 'Router',
            'marca_equipo' => 'Netgear',
            'modelo_equipo' => 'Nighthawk AX12',
            'fecha_recepcion' => '2024-02-07',
            'fecha_entrega' => '2024-02-17',
            'fecha_retiro' => null,
            'equipo_retirado' => false,
            'id_cliente' => 2,
            'multa' => 200.00,
            'monto_pagar' => 800.00
        ]);

        DB::table('equipo')->insert([
            'tipo_equipo' => 'Disco Duro Externo',
            'marca_equipo' => 'Western Digital',
            'modelo_equipo' => 'My Passport 4TB',
            'fecha_recepcion' => '2024-02-09',
            'fecha_entrega' => '2024-02-19',
            'fecha_retiro' => null,
            'equipo_retirado' => false,
            'id_cliente' => 3,
            'multa' => 150.00,
            'monto_pagar' => 600.00
        ]);

        DB::table('equipo')->insert([
            'tipo_equipo' => 'Smartwatch',
            'marca_equipo' => 'Apple',
            'modelo_equipo' => 'Watch Series 6',
            'fecha_recepcion' => '2024-03-01',
            'fecha_entrega' => '2024-03-11',
            'fecha_retiro' => null,
            'equipo_retirado' => false,
            'id_cliente' => 4,
            'multa' => null,
            'monto_pagar' => 500.00
        ]);

        DB::table('equipo')->insert([
            'tipo_equipo' => 'Micrófono',
            'marca_equipo' => 'Shure',
            'modelo_equipo' => 'SM7B',
            'fecha_recepcion' => '2024-03-03',
            'fecha_entrega' => '2024-03-13',
            'fecha_retiro' => null,
            'equipo_retirado' => false,
            'id_cliente' => 1,
            'multa' => null,
            'monto_pagar' => 400.00
        ]);

        DB::table('equipo')->insert([
            'tipo_equipo' => 'Tarjeta Gráfica',
            'marca_equipo' => 'NVIDIA',
            'modelo_equipo' => 'GeForce RTX 3080',
            'fecha_recepcion' => '2024-03-05',
            'fecha_entrega' => '2024-03-15',
            'fecha_retiro' => null,
            'equipo_retirado' => false,
            'id_cliente' => 2,
            'multa' => null,
            'monto_pagar' => 700.00
        ]);

        DB::table('equipo')->insert([
            'tipo_equipo' => 'Teclado Mecánico',
            'marca_equipo' => 'Logitech',
            'modelo_equipo' => 'G915',
            'fecha_recepcion' => '2024-03-07',
            'fecha_entrega' => '2024-03-17',
            'fecha_retiro' => null,
            'equipo_retirado' => false,
            'id_cliente' => 3,
            'multa' => null,
            'monto_pagar' => 250.00
        ]);

        DB::table('equipo')->insert([
            'tipo_equipo' => 'Drone',
            'marca_equipo' => 'DJI',
            'modelo_equipo' => 'Mavic Air 2',
            'fecha_recepcion' => '2024-03-09',
            'fecha_entrega' => '2024-03-19',
            'fecha_retiro' => null,
            'equipo_retirado' => false,
            'id_cliente' => 4,
            'multa' => null,
            'monto_pagar' => 800.00
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
