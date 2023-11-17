<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class SuperAdminSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Creating Super Admin User
        $superAdmin = User::create([
            'name' => 'Johan Carrasco', 
            'email' => 'johanSuperAdmin@hotmail.com',
            'password' => Hash::make('johan12345')
        ]);
        $superAdmin->assignRole('Super Admin');

        // Creating Admin User
        $admin = User::create([
            'name' => 'Juan C', 
            'email' => 'juanAdmin@hotmail.com',
            'password' => Hash::make('juan12345')
        ]);
        $admin->assignRole('Admin');

        // Creating Product Manager User
        $empleado = User::create([
            'name' => 'Pamela C', 
            'email' => 'pamelaEmpleado@hotmail.com',
            'password' => Hash::make('pamela12345')
        ]);
        $empleado->assignRole('Empleado');
    }
}