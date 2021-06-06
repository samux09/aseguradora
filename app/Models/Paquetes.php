<?php

namespace App\Models;

use App\Models\Servicio;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Paquetes extends Model
{
    use HasFactory;
    //Campos para evitar inyección SQL
    protected $fillable = [
        'descripcion',
        'fechaFinal',
        'precio',
    ];

    public function crearPaquete($data, $us_id, $req){
        $return = DB::table("paquetes")->insertGetId([
            "descripcion" => $data["descripcion"],
            "fechaFinal"  => $data["fechaFinal"],
            "precio"      => $data["precio"],
            'user_id'     => $us_id
        ]);
        foreach($req->servicios as $servicio){
            DB::table('paquetes_servicios')->insert([
                "paquete_id" => $return,
                "servicio_id" => $servicio
            ]);
        }
        return $return;
    }

    public function getServicios(){
        $lista = DB::table('paquetes_servicios')
                    ->where('paquete_id', $this->id)
                    ->get('servicio_id');
        $listaServicios = array();
        foreach($lista as $id){
            array_push($listaServicios, Servicio::find($id->servicio_id));
        }
        return $listaServicios;
    }
}
