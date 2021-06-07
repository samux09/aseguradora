<?php

namespace App\Models;

use Illuminate\Support\Str;
use App\Models\Poliza_servicio;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Eloquent\Model;
use Srmklive\PayPal\Services\ExpressCheckout;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Poliza extends Model{
    use HasFactory;
    protected $fillable = [
        'user_id',
        'paquete_id',
        'fechaFinal',
        'marca',
        'modelo',
        'año',
        'placa',
        'numSerie',
        'autorizado',
        'imagenes'
    ];

    public function crearPoliza($data, $us_id, $ruta){
        $return = DB::table("polizas")->insertGetId([
            "user_id" => $us_id,
            "paquete_id"  => $data["id"],
            "fechaFinal"      => $this->getFechaFinal(),
            'marca'     => $data["marca"],
            'modelo' => $data["modelo"],
            "año"  => $data["año"],
            "placa"  => $data["placa"],
            "numSerie"  => $data["numSerie"],
            "autorizado"  => 0,
            "imagenes"  => $ruta,
        ]);
        return $return;
    }

    public static function consumirServicioPago($precio){
        $provider = new ExpressCheckout;
        $data = [];
        $data['items'] = [
            [
                'name' => 'Product 1',
                'price' => 9.99,
                'desc'  => 'Description for product 1',
                'qty' => 1
            ],
            [
                'name' => 'Product 2',
                'price' => 4.99,
                'desc'  => 'Description for product 2',
                'qty' => 2
            ]
        ];

        $data['invoice_id'] = 1;
        $data['invoice_description'] = "Order #{$data['invoice_id']} Invoice";
        $data['return_url'] = url('/polizas/mostrarpolizas');
        $data['cancel_url'] = url('/cart');

        $total = 0;
        foreach($data['items'] as $item) {
            $total += $item['price']*$item['qty'];
        }

        $data['total'] = $total;
        $response = $provider->setExpressCheckout($data);
        return $response;
    }

    public function getFechaFinal(){
        $fecha = date("Y-m-d");
        $año = (int)Str::substr($fecha, 0, 4);
        $año +=1;
        $año = $año.Str::substr($fecha, 4);
        return $año;
    }

    public function poliza_servicios(){
        return $this->hasMany(Poliza_servicio::class);
    }

    public function calcularTotal($dias, $servicios){
        $precio = 0;
        $cont = 0;
        foreach($servicios as $servicio){
            $precio += (int)Servicio::find($servicio)->precio * (int)$dias[(int)$servicio-1];
            $cont++;
        }
        return $precio;
    }

    public function agregarServiciosExtra($servicios, $poliza){
        foreach($servicios as $servicio){
            DB::table('poliza_servicios')->insert([
                "poliza_id" => $poliza,
                "servicio_id" => $servicio,
                "autorizado" => 0,
                "fecha_ini" => date("Y-m-d"),
                "fecha_fin" => date("Y-m-d")
            ]);
        }
        return;
    }

    public function autorizarPago(){
        DB::table('polizas')
                ->where('id', $this->id)
                ->update(['autorizado' => 1]);
    }

    public function getServiciosExtra(){
        $lista = DB::table('poliza_servicios')
                    ->where('poliza_id', $this->id)
                    ->get('servicio_id');
        $listaServicios = array();

        foreach($lista as $id){
            array_push($listaServicios, Servicio::find($id->servicio_id));
        }
        return $listaServicios;
    }

    public function guardarImagenes($imagenes){
        $ruta = "";
        foreach($imagenes as $imagen){
            $ruta = $ruta ."_". $imagen->store('upload-autos', 'public');
        }
        return $ruta;
    }

}
