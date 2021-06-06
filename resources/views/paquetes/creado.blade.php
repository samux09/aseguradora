@extends('layouts.app')

@section('content')
    <h2 class="text-center mb-5">Lista de paquetes creados</h2>
    <div class="col-md-6 mx-auto bg-white p-3">
        <form action="{{ route('paquetes.busqueda') }}"  method="POST" >
            @csrf
            <div class="form-group">
                <input type="text"
                    name="id"
                    class="form-control"
                    id="id"
                    placeholder="Ej. 1"
                >
                <input type="submit" value="Ver Paquete" class="btn btn-primary mt-3">
            </div>
        </form>
    </div>
    <div class="col-md-10 mx-auto bg-white p-3">
        <table class="table" id="tabla">
            <thead class="bg-primary text-light">
                <tr>
                    <th scole="Paquete">Paquete</th>
                    <th scole="Descripción">Descripción</th>
                    <th scole="Precio">Precio</th>
                    <th scole="Ver">Ver</th>
                </tr>
            </thead>
            <tbody>

                @foreach($paquetes as $paquete)
                    <tr>
                        <td>{{ $paquete->id }}</td>
                        <td>{{ $paquete->descripcion }}</td>
                        <td>{{ $paquete->precio }}</td>
                        <td><a href="/paquetes/{{ $paquete->id }}" class="btn btn-success mr-1">Ver</a></td>
                    </tr>
                @endforeach 
            </tbody>
        </table>
    </div>
    
@endsection