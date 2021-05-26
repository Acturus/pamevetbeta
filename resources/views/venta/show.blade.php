@extends('layouts.app')

@section('template_title')
    {{ $venta->name ?? 'Show Venta' }}
@endsection

@section('content')
    <section class="content container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <div class="float-left">
                            <span class="card-title">Show Venta</span>
                        </div>
                        <div class="float-right">
                            <a class="btn btn-primary" href="{{ route('ventas.index') }}"> Back</a>
                        </div>
                    </div>

                    <div class="card-body">
                        
                        <div class="form-group">
                            <strong>Id Cliente:</strong>
                            {{ $venta->id_cliente }}
                        </div>
                        <div class="form-group">
                            <strong>Id Estado:</strong>
                            {{ $venta->id_estado }}
                        </div>
                        <div class="form-group">
                            <strong>Costo Total:</strong>
                            {{ $venta->costo_total }}
                        </div>
                        <div class="form-group">
                            <strong>Tipo Entrega:</strong>
                            {{ $venta->tipo_entrega }}
                        </div>
                        <div class="form-group">
                            <strong>Fecha Entrega:</strong>
                            {{ $venta->fecha_entrega }}
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
