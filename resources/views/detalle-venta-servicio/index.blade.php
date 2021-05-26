@extends('layouts.app')

@section('template_title')
    Detalle Venta Servicio
@endsection

@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-12">
                <div class="card">
                    <div class="card-header">
                        <div style="display: flex; justify-content: space-between; align-items: center;">

                            <span id="card_title">
                                {{ __('Detalle Venta Servicio') }}
                            </span>

                             <div class="float-right">
                                <a href="{{ route('detalle-venta-servicios.create') }}" class="btn btn-primary btn-sm float-right"  data-placement="left">
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
										<th>Id Servicio</th>
										<th>Cantidad</th>
										<th>Subtotal</th>

                                        <th></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($detalleVentaServicios as $detalleVentaServicio)
                                        <tr>
                                            <td>{{ ++$i }}</td>
                                            
											<td>{{ $detalleVentaServicio->id_venta }}</td>
											<td>{{ $detalleVentaServicio->id_servicio }}</td>
											<td>{{ $detalleVentaServicio->cantidad }}</td>
											<td>{{ $detalleVentaServicio->subtotal }}</td>

                                            <td>
                                                <form action="{{ route('detalle-venta-servicios.destroy',$detalleVentaServicio->id) }}" method="POST">
                                                    <a class="btn btn-sm btn-primary " href="{{ route('detalle-venta-servicios.show',$detalleVentaServicio->id) }}"><i class="fa fa-fw fa-eye"></i> Show</a>
                                                    <a class="btn btn-sm btn-success" href="{{ route('detalle-venta-servicios.edit',$detalleVentaServicio->id) }}"><i class="fa fa-fw fa-edit"></i> Edit</a>
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
                {!! $detalleVentaServicios->links() !!}
            </div>
        </div>
    </div>
@endsection
