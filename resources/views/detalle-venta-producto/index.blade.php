@extends('layouts.app')

@section('template_title')
    Detalle Venta Producto
@endsection

@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-12">
                <div class="card">
                    <div class="card-header">
                        <div style="display: flex; justify-content: space-between; align-items: center;">

                            <span id="card_title">
                                {{ __('Detalle Venta Producto') }}
                            </span>

                             <div class="float-right">
                                <a href="{{ route('detalle-venta-productos.create') }}" class="btn btn-primary btn-sm float-right"  data-placement="left">
                                  {{ __('Create New') }}
                                </a>
                              </div>
                        </div>
                    </div>
                    @if ($message = Session::get('success'))
                        <div class="alert alert-success">
                            <p>{{ $message }}</p>
                        </div>
                    @endif

                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-striped table-hover">
                                <thead class="thead">
                                    <tr>
                                        <th>No</th>
                                        
										<th>Id Venta</th>
										<th>Id Producto</th>
										<th>Cantidad</th>
										<th>Subtotal</th>

                                        <th></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($detalleVentaProductos as $detalleVentaProducto)
                                        <tr>
                                            <td>{{ ++$i }}</td>
                                            
											<td>{{ $detalleVentaProducto->id_venta }}</td>
											<td>{{ $detalleVentaProducto->id_producto }}</td>
											<td>{{ $detalleVentaProducto->cantidad }}</td>
											<td>{{ $detalleVentaProducto->subtotal }}</td>

                                            <td>
                                                <form action="{{ route('detalle-venta-productos.destroy',$detalleVentaProducto->id) }}" method="POST">
                                                    <a class="btn btn-sm btn-primary " href="{{ route('detalle-venta-productos.show',$detalleVentaProducto->id) }}"><i class="fa fa-fw fa-eye"></i> Show</a>
                                                    <a class="btn btn-sm btn-success" href="{{ route('detalle-venta-productos.edit',$detalleVentaProducto->id) }}"><i class="fa fa-fw fa-edit"></i> Edit</a>
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit" class="btn btn-danger btn-sm"><i class="fa fa-fw fa-trash"></i> Delete</button>
                                                </form>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
                {!! $detalleVentaProductos->links() !!}
            </div>
        </div>
    </div>
@endsection
