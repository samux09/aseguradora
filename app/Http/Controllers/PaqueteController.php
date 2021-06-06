<?php

namespace App\Http\Controllers;

use auth;
use App\Models\Paquetes;
use App\Models\Servicio;
use Illuminate\Support\Arr;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class PaqueteController extends Controller{
    public function __construct(){
        $this->middleware("auth", ['except' => ['show']]);
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(){
        $paquetes = auth()->user()->paquetes;
        return view("paquetes.creado")->with("paquetes", $paquetes);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(){
        //con modelo.
        $servicios = Servicio::all(['id','nombre', 'descripcion', 'precio']);
        return view("paquetes.create")->with('servicios', $servicios);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request){
        $data = request()->validate([
            "fechaFinal" => "required|min:10",
            "servicios" => "required",
            "descripcion" => "required",
            "precio" => "required"
        ]);
        $paq = new Paquetes();
        $ret = $paq->crearPaquete($data, Auth::user()->id, $request);
        return redirect()->action("PaqueteController@index");
    }

    public function busqueda(Request $request){
        $data = request()->validate([
            "id" => "required"
        ]);
        $id = $data["id"];
        $paquete = Paquetes::find($id);
        $servicios = $paquete->getServicios();
        return view("paquetes.show", compact('paquete', 'servicios'));
    }
    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Paquete  $paquete
     * @return \Illuminate\Http\Response
     */
    public function show($paquete){
        $paquete = Paquetes::find($paquete);
        $servicios = $paquete->getServicios();
        return view("paquetes.show", compact('paquete', 'servicios'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Paquete  $paquete
     * @return \Illuminate\Http\Response
     */
    public function edit(Paquetes $paquete)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Paquete  $paquete
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Paquetes $paquete)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Paquete  $paquete
     * @return \Illuminate\Http\Response
     */
    public function destroy(Paquete $paquete)
    {
        //
    }
}
