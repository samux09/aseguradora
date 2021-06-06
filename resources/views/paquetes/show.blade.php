@extends('layouts.app')

@section('content')

<div class="col-md-10 mx-auto bg-white p-3">
    <h2 class="text-center mb-5">Los servicios incluidos en este paquete son los siguientes:</h2>
    <table class="table" id="tabla">
        <thead class="bg-primary text-light">
            <tr>
                <th scole="Servicio">Nombre Servicio</th>
                <th scole="Descripción">Descripción</th>
                <th scole="Precio">Precio</th>
            </tr>
        </thead>
        <tbody>

            @foreach($servicios as $servicio)
                <tr>
                    <td>{{ $servicio->nombre }}</td>
                    <td>{{ $servicio->descripcion }}</td>
                    <td id="td{{ $servicio->id }}">{{ $servicio->precio }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>
    <form >
        <div class="form-group">
            <label for="fechaFinal">Fecha expiración del paquete.</label>
            <input type="text" class="form-control" name="fechaFinal" readonly value={{ $paquete->fechaFinal }}>
        </div>
    </form>
    <form >
        <div class="form-group">
            <label for="fechaFinal">Fecha expiración del paquete.</label>
            <input type="text" class="form-control" name="fechaFinal" readonly value={{ $paquete->fechaFinal }}>
        </div>
    </form>
    <form >
        <div class="form-group">
            <label for="fechaFinal">Descripción.</label>
            <textarea 
                    name="descripcion"
                    class="form-control"
                    id="descripcion"
                    rows="3"
                    readonly
            >{{ $paquete->descripcion }} 
            </textarea>
        </div>
    </form>
</div>


@endsection