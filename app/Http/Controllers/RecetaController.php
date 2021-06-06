<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class RecetaController extends Controller
{
    /**
     * Handle the incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function __invoke(Request $request){
        $recetas = ['Receta Pizza', 'Receta Hamburguesa', 'Receta Tacos'];
        $categorias = ['Comida mexicana', 'Comida argentina', 'Postres'];
        //return view('recetas.index')-> with('recetas', $recetas);

        return view('recetas.index', compact('recetas', 'categorias'));
    }
}
