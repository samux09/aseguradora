@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Register') }}</div>

                <div class="card-body">
                    <form method="POST" action="{{ route('register') }}">
                        @csrf

                        <div class="row justify-content-center">
                            <div class="col-4">
                                <label for="nombre">Nombre(s):</label>
                                <input type="text" class="form-control" name="nombre" id="nombre" value={{ old("nombre") }}>
                            </div>
                            @error("nombre")
                                <span class="invalid-feedback d-block" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                            <div class="col-4">
                                <label for="apellido_paterno">Apellido Paterno:</label>
                                <input type="text" class="form-control" name="apellido_paterno" id="apellido_paterno" value={{ old("apellido_paterno") }}>
                            </div>
                            @error("apellido_paterno")
                            <span class="invalid-feedback d-block" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                            <div class="col-4">
                                <label for="apellido_materno">Apellido Materno:</label>
                                <input type="text" class="form-control" name="apellido_materno" id="apellido_materno" value={{ old("apellido_materno") }}>
                            </div>
                            @error("apellido_materno")
                            <span class="invalid-feedback d-block" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>
                        <div class="row justify-content-center my-3">
                            <div class="col-4">
                                <label for="estado">Estado:</label>
                                <input type="text" class="form-control" name="estado" id="estado" value={{ old("estado") }}>
                            </div>
                            <div class="col-4">
                                <label for="ciudad">Ciudad:</label>
                                <input type="text" class="form-control" name="ciudad" id="ciudad" value={{ old("ciudad") }}>
                            </div>
                            <div class="col-4">
                                <label for="cp">CP:</label>
                                <input type="text" class="form-control" name="cp" id="cp" value={{ old("cp") }}>
                            </div>
                            @error("cp")
                            <span class="invalid-feedback d-block" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>
                        <div class="row justify-content-center my-3">
                            <div class="col-4">
                                <label for="direccion">Dirección:</label>
                                <input type="text" class="form-control" name="direccion" id="direccion" value={{ old("direccion") }}>
                            </div>

                            <div class="col-4">
                                <label for="telefono">Teléfono:</label>
                                <input type="text" class="form-control" name="telefono" id="telefono" value={{ old("telefono") }}>
                            </div>
                            @error("telefono")
                            <span class="invalid-feedback d-block" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>
                        <div class="row align-items-start my-3">
                            <div class="col-4">
                                <label for="email">Correo:</label>
                                <input type="text" class="form-control" name="email" id="email" value={{ old("email") }}>
                            </div>
                            @error("email")
                            <span class="invalid-feedback d-block" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                            <div class="col-4">
                                <label for="password">Contraseña:</label>
                                <input type="password" class="form-control" name="password" id="password" value={{ old("password") }}>
                            </div>
                            @error("password")
                            <span class="invalid-feedback d-block" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                            <div class="col-4">
                                <label for="password-confirm">Confirmar Contraseña:</label>
                                <input type="password" class="form-control" name="password_confirm" id="password-confirm">
                            </div>
                        </div>

                        <div class="form-group row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('Register') }}
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
