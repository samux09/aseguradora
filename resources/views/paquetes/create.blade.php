@extends('layouts.app')

@section('content')
    <h2 class="text-center mb-5">Crear nuevo paquete</h2>
    <div class="col-md-10 mx-auto bg-white p-3">
        <form action="{{ route('paquetes.store') }}" method="post" novalidate>
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
                        </tr>
                    </thead>
                    <tbody>
        
                        @foreach($servicios as $servicio)
                            <tr>
                                <td>{{ $servicio->nombre }}</td>
                                <td>{{ $servicio->descripcion }}</td>
                                <td id="td{{ $servicio->id }}">{{ $servicio->precio }}</td>
                                <td>
                                    <input class="form-check-input" type="checkbox" value="{{ $servicio->id }}" id="servicios[]" name="servicios[]"
                                    onclick="validarPrecio({{ $servicio->id }});">
                                    <label class="form-check-label" for="flexCheckDefault">
                                    Seleccionar servicio.
                                </td>
                            </tr>
                        @endforeach
                        @error('servicios')
                            <strong style="color:red">La selección de servicios es obligatoria.</strong>
                        @enderror
                    </tbody>
                </table>
            </div>
            <div class="form-group">
                <label for="fechaFinal">Vigencia del paquete</label>
                <input type="text"
                    name="fechaFinal"
                    class="form-control @error ("fechaFinal") is-invalid @enderror"
                    id="fechaFinal"
                    placeholder="aaaa-mm-dd"
                    value={{ old("fechaFinal") }}
                >
                @error("fechaFinal")
                    <span class="invalid-feedback d-block" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>
            <div class="form-group">
                <label for="descripcion">Descripción</label>
                <textarea 
                    name="descripcion"
                    class="form-control"
                    id="descripcion"
                    rows="3"
                > </textarea>
                @error("descripcion")
                    <span class="invalid-feedback d-block" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>
            <div class="form-group">
                <label for="precio">Precio total del paquete</label>
                <input type="text"
                    name="precio"
                    class="form-control"
                    id="precio"
                    value="{{ $sumaTotal }}"
                />
            </div>
            <div class="form-group">
                <input type="submit" value="Crear Paquete" class="btn btn-primary">
            </div>
        </form>
    </div>
    
@endsection

<script>
    function validarPrecio(id){
        if(document.getElementsByClassName("form-check-input").item(id-1).checked){
            let actual = parseInt(document.getElementById("precio").value);
            let sumador = parseInt(document.getElementById("td"+(id)).innerText);
            sumador = sumador*365;
            document.getElementById("precio").value =  actual + sumador ;
            console.log("Checkeado.");
        }else{
            let actual = parseInt(document.getElementById("precio").value);
            let sumador = parseInt(document.getElementById("td"+(id)).innerText);
            sumador = sumador*365;
            document.getElementById("precio").value =  actual - sumador ;
            console.log("Checkeado.");
        }
    }
</script>