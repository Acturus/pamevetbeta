@extends('layouts.app')

@section('template_title')
    {{ $cliente->name ?? 'Info de Cliente' }}
@endsection

@section('content')
    <section class="content container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <div class="float-left">
                            <span class="card-title">Información de Cliente</span>
                        </div>
                        <div class="float-right">
                            <a class="btn btn-sm btn-primary" href="{{ route('clientes.index') }}"> Back</a>
                        </div>
                    </div>

                    <div class="card-body">
                        
                        <div class="form-group">
                            <strong>Documento de identidad:</strong>
                            {{ $cliente->documento_de_identidad }}
                        </div>
                        <div class="form-group">
                            <strong>Nombres:</strong>
                            {{ $cliente->nombres }}
                        </div>
                        <div class="form-group">
                            <strong>Apellidos:</strong>
                            {{ $cliente->apellidos }}
                        </div>
                        <div class="form-group">
                            <strong>Correo:</strong>
                            {{ $cliente->correo }}
                        </div>
                        <div class="form-group">
                            <strong>Celular:</strong>
                            {{ $cliente->celular }}
                        </div>
                        <div class="form-group">
                            <strong>Dirección:</strong>
                            {{ $cliente->direccion }}
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
