@extends('layouts.app')

@section('styles')

<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.carousel.min.css" integrity="sha512-tS3S5qG0BlhnQROyJXvNjeEM4UpMXHrQfTGmbQ1gKmelCxlSEBUaxhRBj/EFTzpbP4RVSrpEikbmdJobCvhE3g==" crossorigin="anonymous" referrerpolicy="no-referrer" />    
    
@endsection

@section('content')    
<div class="container">
    <h2 class="titulo-categoria text-uppercase mb-4">Nuevos Paquetes</h2>
    <div class="owl-carousel owl-theme">
            @foreach($listaPaquetes as $paquete)
            <div class="card">
                <div class="card-body">  
                    <h4>Paquete: {{ $paquete->id }}</h4>      
                    <div class="d-flex justify-content-between">        
                        <ul>
                          @foreach($paquete->getServicios() as $servicio)
                              <li>{{  $servicio->nombre }}</li>
                          @endforeach
                        </ul>
                    </div>
            
                    <a href="{{ route('paquetes.show', ['paquetes' => $paquete->id]) }}" class="btn btn-primary d-block">Ver Paquete</a>        
                </div>
            </div>   
            @endforeach
    </div>
</div>
@endsection