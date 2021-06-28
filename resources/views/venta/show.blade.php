@extends('layouts.app')

@section('template_title')
    {{ $venta->name ?? 'Detalle de Venta' }}
@endsection

@section('content')
    <section class="content container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <div class="float-left">
                            <span class="card-title">Detalle de Venta</span>
                        </div>
                        <div class="float-right">
                            <a class="btn btn-primary btn-sm" href="{{ route('ventas.index') }}"> Volver</a>
                        </div>
                    </div>

                    <div class="card-body">
                        <div class="form-group">
                            <strong>Costo Total:</strong>
                            {{ $venta->costo_total }}
                        </div>
                        <div class="form-group">
                            <strong>Tipo Entrega:</strong>
                            {{ $venta->tipo_entrega === 1 ? 'A domicilio' : 'En tienda' }}
                        </div>
                        <div class="form-group">
                            <strong>Fecha Entrega:</strong>
                            {{ $venta->fecha_entrega }}
                        </div>
                    </div>

                    <div class="p-4">
                        <p class="h5">Listado de Productos</p>
                        <div class="table-responsive">
                            <table class="table table-striped table-hover">
                                <thead class="thead">
                                    <tr>
										<th>Nro.</th>
										<th>Nombre</th>
										<th>Precio Unitario</th>
										<th>Cantidad</th>
										<th>Sub total</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($venta->detalleProducto as $detalleProducto)
                                        <tr>
                                            <td>{{ $loop->index+1 }}</td>
                                            <td>{{ $detalleProducto->producto->nombre }}</td>
                                            <td>{{ $detalleProducto->producto->costo_unidad }}</td>
                                            <td>{{ $detalleProducto->cantidad }}</td>
                                            <td>{{ $detalleProducto->subtotal }}</td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
