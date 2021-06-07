<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ServicioSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(){
        DB::table('servicios')->insert([
            'nombre' => 'Protección contra robo de auto',
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s'),
            'fechafin' => '2021-12-10',
            'precio' => 35.0,
            'descripcion' => 'Este servicio te protege contra el robo total de
            tu auto cubriendo el 100% del valor factura.',
        ]);
        DB::table('servicios')->insert([
            'nombre' => 'Protección daños a terceros',
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s'),
            'fechafin' => '2021-10-10',
            'precio' => 10.0,
            'descripcion' => 'Este servicio cubre daños a terceros con un total
            de 300,000 MXN.',
        ]);
        DB::table('servicios')->insert([
            'nombre' => 'Servicio de grua',
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s'),
            'fechafin' => '2021-10-10',
            'precio' => 20.0,
            'descripcion' => 'Este servicio te brinda apoyo en caso de necesitar
            el uso de una grua.',
        ]);
        DB::table('servicios')->insert([
            'nombre' => 'Rescate en helicoptero',
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s'),
            'fechafin' => '2021-12-10',
            'precio' => 1000.0,
            'descripcion' => 'Si cuentas con este servicio, un helicoptero irá a rescatarte en caso de emergencia.',
        ]);
        DB::table('servicios')->insert([
            'nombre' => 'Protección asalto a mano armada',
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s'),
            'fechafin' => '2021-12-10',
            'precio' => 30.0,
            'descripcion' => 'Este servicio te indemnizará en caso de un asalto a mano armada.',
        ]);
    }
}
