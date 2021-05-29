@extends('layouts.app')

@section('template_title')
    {{ $provider->name ?? 'Datos de Proveedor' }}
@endsection

@section('content')
    <section class="content container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <div class="float-left">
                            <span class="card-title">Información</span>
                        </div>
                        <div class="float-right">
                            <a class="btn btn-sm btn-primary" href="{{ route('providers.index') }}"> Volver</a>
                        </div>
                    </div>

                    <div class="card-body">
                        
                        <div class="form-group">
                            <strong>Nombre:</strong>
                            {{ $provider->nombre }}
                        </div>
                        <div class="form-group">
                            <strong>Contacto:</strong>
                            {{ $provider->contacto }}
                        </div>
                        <div class="form-group">
                            <strong>Correo contacto:</strong>
                            {{ $provider->correo }}
                        </div>
                        <div class="form-group">
                            <strong>Número de Contacto:</strong>
                            {{ $provider->numero }}
                        </div>
                        <div class="form-group">
                            <strong>Dirección:</strong>
                            {{ $provider->direccion }}
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
