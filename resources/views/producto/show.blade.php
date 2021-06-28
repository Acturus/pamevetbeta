@extends('layouts.app')

@section('template_title')
    {{ $producto->name ?? 'Detalle de Producto' }}
@endsection

@section('content')
    <section class="content container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <div class="float-left">
                            <span class="card-title">Detalle de Producto</span>
                        </div>
                        <div class="float-right">
                            <a class="btn btn-sm btn-primary" href="{{ route('productos.index') }}"> Volver</a>
                        </div>
                    </div>

                    <div class="card-body">

                        <div class="form-group">
                            <strong>Nombre:</strong>
                            {{ $producto->nombre }}
                        </div>
                        <div class="form-group">
                            <strong>Marca:</strong>
                            {{ $producto->provider->nombre }}
                        </div>
                        <div class="form-group">
                            <strong>Unidad Medida:</strong>
                            {{ $producto->unidad_medida }}
                        </div>
                        <div class="form-group">
                            <strong>Descripción:</strong>
                            {{ $producto->descripcion }}
                        </div>
                        <div class="form-group">
                            <strong>Cantidad:</strong>
                            {{ $producto->cantidad }}
                        </div>
                        <div class="form-group">
                            <strong>Costo Unidad:</strong>
                            {{ $producto->costo_unidad }}
                        </div>
                        <div class="form-group">
                            <strong>Fotos:</strong><br><br>
                            <div>
                            @foreach(explode(',', $producto->fotos) as $urlfoto)
                                <img src="/{{ $urlfoto }}" class="rounded float-start" height="220">
                            @endforeach
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
