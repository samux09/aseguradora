<?php

use Illuminate\Support\Facades\Route;


Route::get('/', function () {
    return view('welcome');
});
Route::get('paquetes/mostrarpaquete', function(){
    return view('paquetes.paquetes');
});

Route::get('/paquetes/create', 'PaqueteController@create')->name('paquetes.create');
Route::post('/paquetes/store', 'PaqueteController@store')->name('paquetes.store');
Route::get('/paquetes', 'PaqueteController@index')->name('paquetes.creado');
Route::get('/paquetes/{paquetes}', 'PaqueteController@show')->name('paquetes.show');

Route::post('/paquetes/busqueda', 'PaqueteController@busqueda')->name('paquetes.busqueda');


// Auth::routes();

Auth::routes();


