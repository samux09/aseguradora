@extends('layouts.app')

@section('content')

<div class="col-md-10 mx-auto bg-white p-3">
    <h2 class="text-center mb-5">Poliza</h2>
   
    <div class="list-group">
     
      <a class="list-group-item list-group-item-action flex-column align-items-start">
        <div class="d-flex w-100 justify-content-between">
          <h5 class="mb-1">Modelo</h5>
        </div>
        <span class="label label-default">{{ $poliza->modelo }}</span>
      </a>

      <a  class="list-group-item list-group-item-action flex-column align-items-start">
        <div class="d-flex w-100 justify-content-between">
          <h5 class="mb-1">Marca</h5>
        </div>
        <span class="label label-default">{{ $poliza->marca }}</span>
      </a>
      
      <a class="list-group-item list-group-item-action flex-column align-items-start">
        <div class="d-flex w-100 justify-content-between">
          <h5 class="mb-1">Año</h5>
        </div>
        <span class="label label-default">{{ $poliza->año }}</span>
      </a>

      <a class="list-group-item list-group-item-action flex-column align-items-start">
        <div class="d-flex w-100 justify-content-between">
          <h5 class="mb-1">Periodo de vigencia</h5>
        </div>
        <span class="label label-default">{{ $poliza->fechaFinal }}</span>
      </a>

      <a class="list-group-item list-group-item-action flex-column align-items-start">
        <div class="d-flex w-100 justify-content-between">
          <h5 class="mb-1">Numero de serie</h5>
        </div>
        <span class="label label-default">{{ $poliza->numSerie }}</span>
      </a>

      <a class="list-group-item list-group-item-action flex-column align-items-start">
        <div class="d-flex w-100 justify-content-between">
          <h5 class="mb-1">Placa</h5>
        </div>
        <span class="label label-default">{{ $poliza->placa }}</span>
      </a>

      @if(count($servicios) > 0)
      <h2 class="text-center mt-4">Servicios Extra:</h2>
        <table class="table" id="tabla">
          <thead class="bg-primary text-light">
              <tr>
                  <th scole="Servicio">Nombre Servicio</th>
                  <th scole="Descripción">Descripción</th>
              </tr>
          </thead>
          <tbody>
              @foreach($servicios as $servicio)
                  <tr>
                      <td>{{ $servicio->nombre }}</td>
                      <td>{{ $servicio->descripcion }}</td>
                  </tr>
              @endforeach
          </tbody>
        </table>
      @endif


      <a href="{{ route('polizas.serviciosextra', ['poliza' => $poliza->id]) }}" class="btn btn-primary d-block">Agregar Servicios Extra</a>
</div>
</div>
    
@endsection