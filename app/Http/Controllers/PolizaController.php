<?php

namespace App\Http\Controllers;

use App\Models\Poliza;
use App\Models\Paquetes;
use App\Models\Servicio;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Srmklive\PayPal\Services\ExpressCheckout;

class PolizaController extends Controller{
    public function store(Request $request){
        $paquete = Paquetes::find(1);
        $consumoServicio = Poliza::consumirServicioPago($paquete->precio);
        $ruta = "";
        $data = request()->validate([
            "marca" => "required",
            "modelo" => "required",
            "año" => ['required', 'integer'],
            "placa" => "required",
            "numSerie" => "required",
            "imagenes.*" => "required|image",
            "id" => "required"
        ]);
        $poliza = new Poliza();
        $ruta = $poliza->guardarImagenes($request['imagenes']);
        $usuarioAutenticado = auth()->user()->id;
        $poliza->crearPoliza($data, $usuarioAutenticado, $ruta);
        return redirect($consumoServicio['paypal_link']);
    }

    public function __construct(){
        $this->middleware("auth");
    }

    public function create($paquete){
        $paquete = Paquetes::find($paquete);
        return view("polizas.crear")->with('paquete', $paquete);
    }

    public function mostrarPolizas(Request $request){
        $polizas = auth()->user()->polizas;
        return view("polizas.indexpoliza", compact('request', 'polizas'));
    }

    public function detallePoliza($poliza){
        $poliza = Poliza::find($poliza);
        $poliza->autorizarPago();
        $servicios=$poliza->getServiciosExtra();
        return view("polizas.detallepoliza", compact('poliza','servicios'));
    }

    public function serviciosExtra($poliza){
        $servicios = Servicio::all(['id','nombre', 'descripcion', 'precio']);
        $poliza = Poliza::find($poliza);
        return view("polizas.serviciosextra", compact('servicios', 'poliza'));
    }

    public function guardarServicios(Request $request){
        $data = request()->validate([
            "servicios" => "required",
            "dias" => ["required"],
        ]);
        $poliza = Poliza::find($request["id"]);
        $precio = $poliza->calcularTotal($data["dias"],$data["servicios"]);
        $consumoServicio = $poliza->consumirServicioPago($precio);
        $poliza->agregarServiciosExtra($data["servicios"], $poliza->id);
        $servicios=$poliza->getServiciosExtra();
        return redirect($consumoServicio['paypal_link']);
    }
}
