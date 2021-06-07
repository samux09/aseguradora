<?php

use Illuminate\Support\Facades\Route;



Route::get('/', 'HomeController@index')->name('home.index');

Route::get('/polizas/crear/{paquetes}', 'PolizaController@create')->name('polizas.crear');
Route::post('/polizas/store', 'PolizaController@store')->name('polizas.store');
Route::post('/polizas/guardarservicios', 'PolizaController@guardarServicios')->name('polizas.guardarservicios');
Route::get('/polizas/mostrarpolizas', 'PolizaController@mostrarPolizas')->name('polizas.mostrar');
Route::get('/polizas/detallepoliza/{poliza}', 'PolizaController@detallePoliza')->name('polizas.detalle');
Route::get('/polizas/serviciosextra/{poliza}', 'PolizaController@serviciosExtra')->name('polizas.serviciosextra');

Route::get('/paquetes/mostrarpaquete', 'PaqueteController@mostrarPaquetes')->name('paquetes.mostrar');
Route::get('/paquetes/create', 'PaqueteController@create')->name('paquetes.create');
Route::post('/paquetes/store', 'PaqueteController@store')->name('paquetes.store');
Route::get('/paquetes', 'PaqueteController@index')->name('paquetes.creado');
Route::get('/paquetes/{paquetes}', 'PaqueteController@show')->name('paquetes.show');
Route::post('/paquetes/busqueda', 'PaqueteController@busqueda')->name('paquetes.busqueda');


Auth::routes();
