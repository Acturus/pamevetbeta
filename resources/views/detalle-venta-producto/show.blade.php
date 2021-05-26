@extends('layouts.app')

@section('template_title')
    {{ $detalleVentaProducto->name ?? 'Show Detalle Venta Producto' }}
@endsection

@section('content')
    <section class="content container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <div class="float-left">
                            <span class="card-title">Show Detalle Venta Producto</span>
                        </div>
                        <div class="float-right">
                            <a class="btn btn-primary" href="{{ route('detalle-venta-productos.index') }}"> Back</a>
                        </div>
                    </div>

                    <div class="card-body">
                        
                        <div class="form-group">
                            <strong>Id Venta:</strong>
                            {{ $detalleVentaProducto->id_venta }}
                        </div>
                        <div class="form-group">
                            <strong>Id Producto:</strong>
                            {{ $detalleVentaProducto->id_producto }}
                        </div>
                        <div class="form-group">
                            <strong>Cantidad:</strong>
                            {{ $detalleVentaProducto->cantidad }}
                        </div>
                        <div class="form-group">
                            <strong>Subtotal:</strong>
                            {{ $detalleVentaProducto->subtotal }}
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
