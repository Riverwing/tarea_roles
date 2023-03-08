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
        $roles = ["administrador", "gestor", "comercial"];/*será un array de tipos  de rol*/
        foreach ($roles as $role) {
            Role::create(["name" => $role]);
        }
    }
}
