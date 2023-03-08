<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;

/*importamos la clase user para poder utilizarla*/

use Illuminate\Support\Str;

/*la clase str hay q importarla pq usamos un valor aleatorio en userseeders.*/

use Spatie\Permission\Models\Role;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        /*CREAMOS TRES TIPOS DE USUARIOS QUE TENDRÁN DIFERENTES ROLES*/

        /*ADMINISTRADOR*/
        $user = new User ([

            'name' => 'administrador',
            'email' => 'a@a.com',
            'email_verified_at' => now(),
            'password' => bcrypt('12345678'),
            'remember_token' => Str::random(10),

        ]);
        /*le asignamos el rol al usuario y lo guardamos */
        $rol = Role::where('name', 'administrador')->first();/**/
        $user->assignRole($rol);
        $user->saveOrFail();

        /*GESTOR*/
        $user = new User ([

            'name' => 'gestor',
            'email' => 'g@g.com',
            'email_verified_at' => now(),
            'password' => bcrypt('12345678'),
            'remember_token' => Str::random(10),

        ]);
        $rol = Role::where('name', 'gestor')->first();
        $user->assignRole($rol);
        $user->saveOrFail();

        /*COMERCIAL*/
        $user = new User ([

            'name' => 'comercial',
            'email' => 'c@c.com',
            'email_verified_at' => now(),
            'password' => bcrypt('12345678'),
            'remember_token' => Str::random(10),

        ]);
        $rol = Role::where('name', 'comercial')->first();
        $user->assignRole($rol);
        $user->saveOrFail();

    }
}
