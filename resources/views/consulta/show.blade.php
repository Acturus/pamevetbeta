@extends('layouts.app')

@section('template_title')
    {{ $consulta->name ?? 'Consulta' }}
@endsection

@section('content')
    <section class="content container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <div class="float-left">
                            <span class="card-title">Detalle de Consulta</span>
                        </div>
                        <div class="float-right">
                            <a class="btn btn-primary btn-sm" href="{{ route('consultas.index') }}"> Volver</a>
                        </div>
                    </div>

                    <div class="card-body">

                        <div class="form-group">
                            <strong>Servicio:</strong>
                            {{ $consulta->servicio->nombre }}
                        </div>
                        <div class="form-group">
                            <strong>Mascota:</strong>
                            {{ $consulta->mascota->nombre }}
                        </div>
                        <div class="form-group">
                            <strong>Encargado:</strong>
                            {{ $consulta->user->nombres.' '.$consulta->user->apellidos }}
                        </div>
                        <div class="form-group">
                            <strong>Cliente:</strong>
                            {{ $consulta->cliente->nombres.' '.$consulta->cliente->apellidos }}
                        </div>
                        <div class="form-group">
                            <strong>Detalle:</strong>
                            <div class="mt-3 ml-3">{!! $consulta->detalle ?? 'Sin detalles (aún no se ha brindado atención)' !!}</div>
                        </div>
                        <div class="form-group">
                            <strong>Inicio:</strong>
                            {{ $consulta->inicio }}
                        </div>
                        <div class="form-group">
                            <strong>Fin:</strong>
                            {{ $consulta->fin }}
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
