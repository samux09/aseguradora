<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class UsuarioSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(){
        DB::table('users')->insert([
            'name' => 'Joel',
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s'),
            'email' => 'correo2@correo.com',
            'password' => Hash::make('12345678'),
            'apellido_paterno' => 'Rivera',
            'apellido_materno' => 'Felix',
            'telefono' => '6675182164',
            'direccion' => 'Conocida',
            'estado' => 'Sinaloa',
            'ciudad' => 'Culiacan',
            'cp' => '80194',
            'permisos' => 1,
            'tipo_usuario' => 0
        ]);
        DB::table('users')->insert([
            'name' => 'Kevin',
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s'),
            'email' => 'correo3@correo.com',
            'password' => Hash::make('12345678'),
            'apellido_paterno' => 'Lizarraga',
            'apellido_materno' => 'Chavez',
            'telefono' => '6671751821',
            'direccion' => 'Conocida',
            'estado' => 'Sinaloa',
            'ciudad' => 'Culiacan',
            'cp' => '80194',
            'permisos' => 1,
            'tipo_usuario' => 0
        ]);
        DB::table('users')->insert([
            'name' => 'Stone',
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s'),
            'email' => 'correo4@correo.com',
            'password' => Hash::make('12345678'),
            'apellido_paterno' => 'Stone',
            'apellido_materno' => 'Villarreal',
            'telefono' => '6675182164',
            'direccion' => 'Conocida',
            'estado' => 'Sinaloa',
            'ciudad' => 'Culiacan',
            'cp' => '80194',
            'permisos' => 1,
            'tipo_usuario' => 0
        ]);

    }
}
