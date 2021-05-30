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

                    <div class="p-4">
                        <p class="h5">Detalles</p>
                        <div class="table-responsive">
                            <table class="table table-striped table-hover">
                                <thead class="thead">
                                    <tr>  
										<th>Tipo</th>
										<th>ID</th>
										<th>Nombre</th>
										<th>Precio Unitario</th>
										<th>Cantidad</th>
										<th>Sub total</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($venta->detalleProducto as $detalleProducto)
                                        <tr>
                                            <td>Producto</td>
                                            <td>{{ $detalleProducto->id }}</td>
                                            <td>{{ $detalleProducto->producto->nombre }}</td>
                                            <td>{{ $detalleProducto->producto->costo_unidad }}</td>
                                            <td>{{ $detalleProducto->cantidad }}</td>
                                            <td>{{ $detalleProducto->subtotal }}</td>
                                        </tr>
                                    @endforeach
                                    @foreach ($venta->detalleServicio as $detalleServicio)
                                        <tr>
                                            <td>Producto</td>
                                            <td>{{ $detalleServicio->id }}</td>
                                            <td>{{ $detalleServicio->servicio->nombre }}</td>
                                            <td>{{ $detalleServicio->servicio->costo }}</td>
                                            <td>{{ $detalleServicio->cantidad }}</td>
                                            <td>{{ $detalleServicio->subtotal }}</td>
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
