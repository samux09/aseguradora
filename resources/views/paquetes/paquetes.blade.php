@extends('layouts.app')

@section('content')
    <h2 class="mb-4 text-uppercase">Paquetes Disponibles</h2>
    <div class="container">
        <div class="row">
            @foreach($paquetes as $paquete)
            @php $servicios = $paquete->getServicios(); @endphp
            <div class="col-md-4 mb-3">
            <div class="card shadow">
            <div class="card-body">        
            <div class="meta-receta d-flex justify-content-between">        
            <ul>
            @foreach($servicios as $servicio)
                <li>{{ $servicio->nombre }}</li>             
            @endforeach
            </ul>
            </div>
            <a href="{{ route('paquetes.show', ['paquetes' => $paquete->id]) }}" class="btn btn-primary d-block">Ver Paquete</a>      
            </div>
            </div>   
            </div>
        @endforeach
        </div>
    </div> 
@endsection