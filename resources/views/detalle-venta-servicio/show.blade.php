@extends('layouts.app')

@section('template_title')
    {{ $detalleVentaServicio->name ?? 'Show Detalle Venta Servicio' }}
@endsection

@section('content')
    <section class="content container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <div class="float-left">
                            <span class="card-title">Show Detalle Venta Servicio</span>
                        </div>
                        <div class="float-right">
                            <a class="btn btn-primary" href="{{ route('detalle-venta-servicios.index') }}"> Back</a>
                        </div>
                    </div>

                    <div class="card-body">
                        
                        <div class="form-group">
                            <strong>Id Venta:</strong>
                            {{ $detalleVentaServicio->id_venta }}
                        </div>
                        <div class="form-group">
                            <strong>Id Servicio:</strong>
                            {{ $detalleVentaServicio->id_servicio }}
                        </div>
                        <div class="form-group">
                            <strong>Cantidad:</strong>
                            {{ $detalleVentaServicio->cantidad }}
                        </div>
                        <div class="form-group">
                            <strong>Subtotal:</strong>
                            {{ $detalleVentaServicio->subtotal }}
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
