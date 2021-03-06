<?php

namespace App\Models;

use GuzzleHttp\Client;
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
            'user_id'     => $us_id,
            'autorizado' => 1
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

    public function paquetes_servicios(){
        return $this->hasMany(Paquetes_servicio::class);
    }

    public function getPaquetes(){
        return Paquetes::all();
    }

    public static function validarPaquete(){
        // $client = new Client();
        // $res = $client->get('http://localhost:8000/api/aseguradora');
        // dd($res);
        return true;
    }
}
