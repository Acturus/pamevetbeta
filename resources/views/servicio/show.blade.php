@extends('layouts.app')

@section('template_title')
    {{ $servicio->name ?? 'Show Servicio' }}
@endsection

@section('content')
    <section class="content container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <div class="float-left">
                            <span class="card-title">Detalle de Servicio</span>
                        </div>
                        <div class="float-right">
                            <a class="btn btn-sm btn-primary" href="{{ route('servicios.index') }}"> Volver</a>
                        </div>
                    </div>

                    <div class="card-body">
                        
                        <div class="form-group">
                            <strong>Nombre:</strong>
                            {{ $servicio->nombre }}
                        </div>
                        <div class="form-group">
                            <strong>Descripcion:</strong>
                            {{ $servicio->descripcion }}
                        </div>
                        <div class="form-group">
                            <strong>Costo:</strong>
                            {{ $servicio->costo }}
                        </div>
                        <div class="form-group">
                            <strong>Fotos:</strong><br><br>
                            <div>
                                <img src="/{{ $servicio->foto }}" class="rounded float-start" height="220">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
