@extends('layouts.app')

@section('content')
<div class="col-md-10 mx-auto bg-white p-3">
    <h2 class="text-center mb-5">La poliza seleccionada es la # {{ $poliza->id }}</h2>
    <form action="{{ route('polizas.guardarservicios') }}" method="post" novalidate>
        @csrf
        @php
            $sumaTotal = 0;
        @endphp
        <div class="form-group">
            <table class="table" id="tabla">
                <thead class="bg-primary text-light">
                    <tr>
                        <th scole="Servicio">Nombre Servicio</th>
                        <th scole="Descripción">Descripción</th>
                        <th scole="Precio">Precio</th>
                        <th scole="Seleccionar">Seleccionar</th>
                        <th scole="Dias">Días Requeridos</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($servicios as $servicio)

                        <tr>
                            <td>{{ $servicio->nombre }}</td>
                            <td>{{ $servicio->descripcion }}</td>
                            <td id="td{{ $servicio->id }}">{{ $servicio->precio }}</td>
                            <td>
                                <input class="form-check-input" disabled type="checkbox" value="{{ $servicio->id }}" id="servicios[]" name="servicios[]"
                                onclick="">
                                <label class="form-check-label" for="flexCheckDefault">
                                Seleccionar servicio.
                            </td>
                            <td><input type="number" name="dias[]" id="dias[]" min=1 class="form-input" onchange="activarCheck({{ $servicio->id }})">
                            </td>
                        </tr>
                    @endforeach
                    @error('servicios')
                        <strong style="color:red">La selección de servicios es obligatoria.</strong>
                    @enderror
                </tbody>
            </table>
            @error('dias')
            <span class="invalid-feedback d-block" role="alert">
                <strong>{{ $message }}</strong>
            </span>
        @enderror
        </div>
        <input type="text"  value="{{ $poliza->id }}" name="id" id="id" style="visibility: hidden">
        <div class="form-group">
            <input type="submit" value="Agregar servicios." class="btn btn-primary">
        </div>
    </form>
</div>


@endsection

<script>
    function activarCheck(id){
        if(parseInt(document.getElementsByClassName("form-input").item(id-1).value) > 0){
            document.getElementsByClassName("form-check-input").item(id-1).disabled=false;
        }else{
            document.getElementsByClassName("form-check-input").item(id-1).disabled=true;
        }
    }

    function validarPrecio(id){
        if(document.getElementsByClassName("form-check-input").item(id-1).checked){
            let actual = parseInt(document.getElementById("precio").value);
            let sumador = parseInt(document.getElementById("td"+(id)).innerText);
            let dias = parseInt(document.getElementsByClassName("form-input").item(id-1).value);
            sumador = sumador*dias;
            console.log(actual + sumador);
            document.getElementById("precio").value =  actual + sumador ;
        }else{
            let actual = parseInt(document.getElementById("precio").value);
            let sumador = parseInt(document.getElementById("td"+(id)).innerText);
            let dias = parseInt(document.getElementsByClassName("form-input").item(id-1).value);
            sumador = sumador*dias;
            document.getElementById("precio").value =  actual - sumador ;
        }
    }
</script>