@extends('layouts.app')

@section('template_title')
    Venta
@endsection

@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-12">
                <div class="card">
                    <div class="card-header">
                        <div style="display: flex; justify-content: space-between; align-items: center;">
                            <span id="card_title">
                                {{ __('Venta') }}
                            </span>
                            <div class="float-right">
                                <a href="{{ route('ventas.create') }}" class="btn btn-primary btn-sm float-right"  data-placement="left">
                                    {{ __('Nueva Venta') }}
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
										<th>Cliente</th>
										<th>Estado</th>
										<th>Costo Total</th>
										<th>Tipo Entrega</th>
										<th>Fecha Entrega</th>
                                        <th></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($ventas as $venta)
                                        <tr>                                            
											<td>{{ $loop->index + 1 }}</td>
											<td>{{ $venta->cliente->nombres.' '.$venta->cliente->apellidos }}</td>
                                            @switch($venta->id_estado)
                                                    @case(1)
                                                        <td>Registrado</td>
                                                        @break
                                                    @case(2)
                                                        <td>Aprobado</td>
                                                        @break
                                                    @case(3)
                                                        <td>En camino</td>
                                                        @break
                                                    @case(4)
                                                        <td>Entregado</td>
                                                        @break
                                                    @default
                                                        <td>Anulado</td>
                                                @endswitch
											<td>{{ $venta->costo_total }}</td>
											<td>{{ $venta->tipo_entrega === 1 ? 'A domicilio' : 'En tienda' }}</td>
											<td>{{ $venta->fecha_entrega }}</td>

                                            <td>
                                                <a class="btn btn-sm btn-primary " href="{{ route('ventas.show',$venta->id) }}"><i class="fa fa-fw fa-eye"></i> Detalles</a>
                                                <a class="btn btn-sm btn-success" href="{{ route('ventas.edit',$venta->id) }}"><i class="fa fa-fw fa-edit"></i> Actualizar</a>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
