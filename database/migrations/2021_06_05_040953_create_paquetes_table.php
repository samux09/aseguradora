<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePaquetesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up(){
        Schema::create('servicios', function(Blueprint $table){
            $table->id();
            $table->string('nombre');
            $table->text('descripcion');
            $table->float('precio');
            $table->date('fechafin');
            $table->timestamps();
        });
        Schema::create('paquetes', function (Blueprint $table) {
            $table->id();
            $table->string('descripcion');
            $table->text('fechaFinal');
            $table->float('precio');
            $table->tinyInteger('autorizado');
            $table->foreignId('user_id')->references('id')->on('users')->comment('El empleado que crea el paquete.');
            $table->timestamps();
        });
        Schema::create('paquetes_servicios', function(Blueprint $table){
            $table->id();
            $table->foreignId('servicio_id')->references('id')->on('servicios');
            $table->foreignId('paquete_id')->references('id')->on('paquetes');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down(){
        Schema::dropIfExists('paquetes_servicios');
        Schema::dropIfExists('servicios');
        Schema::dropIfExists('paquetes');
    }
}
