@extends('layouts.app')

@section('template_title')
    {{ $estadoVenta->name ?? 'Show Estado Venta' }}
@endsection

@section('content')
    <section class="content container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <div class="float-left">
                            <span class="card-title">Show Estado Venta</span>
                        </div>
                        <div class="float-right">
                            <a class="btn btn-primary" href="{{ route('estado-ventas.index') }}"> Back</a>
                        </div>
                    </div>

                    <div class="card-body">
                        
                        <div class="form-group">
                            <strong>Nombre:</strong>
                            {{ $estadoVenta->nombre }}
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
