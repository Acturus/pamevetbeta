@extends('layouts.app')

@section('template_title')
    {{ $stockProducto->name ?? 'Show Stock Producto' }}
@endsection

@section('content')
    <section class="content container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <div class="float-left">
                            <span class="card-title">Show Stock Producto</span>
                        </div>
                        <div class="float-right">
                            <a class="btn btn-primary" href="{{ route('stock-productos.index') }}"> Back</a>
                        </div>
                    </div>

                    <div class="card-body">
                        
                        <div class="form-group">
                            <strong>Id Producto:</strong>
                            {{ $stockProducto->id_producto }}
                        </div>
                        <div class="form-group">
                            <strong>Cantidad:</strong>
                            {{ $stockProducto->cantidad }}
                        </div>
                        <div class="form-group">
                            <strong>Costo Unidad:</strong>
                            {{ $stockProducto->costo_unidad }}
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
