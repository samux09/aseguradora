@extends('layouts.app')

@section('content')
    <h2 class="text-center mb-5">Usuario</h2>
    <div class="col-md-10 mx-auto bg-white p-3">
      <table class="table table-bordered table-hover" id="tabla">
          <thead class="bg-primary text-light">
              <tr>
                  <th scole="Poliza">Poliza</th>
                  <th scole="Marca">Marca</th>
                  <th scole="Placa">Placa</th>
                  <th scole="Modelo">Modelo</th>
                  <th scole="Ver">Seleccionar</th>
              </tr>
          </thead>
          <tbody>
            @foreach($polizas as $poliza)
            <tr>
              <th scope="row">{{ $poliza->id }}</th>
              <td>{{ $poliza->placa }}</td>
              <td>{{ $poliza->marca }}</td>
              <td>{{ $poliza->modelo }}</td>
              <td><a href="{{ route('polizas.detalle', ['poliza' => $poliza->id]) }}" class="btn btn-success d-block">Seleccionar</a></td>
            </tr>
            @endforeach
          </tbody>
      </table>
@endsection
