<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class Polizas extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up(){
        Schema::create('polizas', function(Blueprint $table){
            $table->id();
            $table->foreignId('user_id')->references('id')->on('users');
            $table->foreignId('paquete_id')->references('id')->on('paquetes');
            $table->date('fechaFinal');
            $table->string('marca');
            $table->string('modelo');
            $table->string('año');
            $table->string('placa');
            $table->string('numSerie');
            $table->tinyInteger('autorizado');
            $table->text('imagenes');
            $table->timestamps();
        });

        Schema::create('poliza_servicios', function(Blueprint $table){
            $table->id();
            $table->foreignId('servicio_id')->references('id')->on('servicios');
            $table->foreignId('poliza_id')->references('id')->on('polizas');
            $table->tinyInteger('autorizado');
            $table->date('fecha_ini');
            $table->date('fecha_fin');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down(){
        Schema::dropIfExists('poliza_servicios');
        Schema::dropIfExists('polizas');
    }
}
