<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Role::create(['name' => 'Super Admin']);
        $admin = Role::create(['name' => 'Admin']);
        $empleado = Role::create(['name' => 'Empleado']);

        $admin->givePermissionTo([
            'create-user',
            'edit-user',
            'delete-user',
            'create-role',
            'edit-role',
            'delete-role',
            'delete-cliente',
            'create-equipo',
            'edit-equipo',
            'delete-equipo',
        ]);

        $empleado->givePermissionTo([
            'create-cliente',
            'edit-cliente',
            'create-equipo',
            'edit-equipo',
        ]);
    }
}