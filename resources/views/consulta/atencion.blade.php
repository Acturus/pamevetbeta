@extends('layouts.app')

@section('template_title')
    Consultas Asignadas
@endsection

@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-12">
                <div class="card">
                    <div class="card-header">
                        <div style="display: flex; justify-content: space-between; align-items: center;">
                            <span id="card_title">
                                {{ __('Listado de Consultas') }}
                            </span>
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
                                        <th>Nro</th>

										<th>Servicio</th>
										<th>Mascota</th>
                                        <th>Cliente</th>
										<th>Horario de Inicio</th>

                                        <th></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($consultas as $consulta)
                                        <tr>
                                            <td>{{ $loop->index + 1 }}</td>

											<td>{{ $consulta->servicio->nombre }}</td>
											<td>{{ $consulta->mascota->nombre }}</td>
											<td>{{ $consulta->cliente->nombres.' '.$consulta->cliente->apellidos }}</td>
											<td>{{ $consulta->inicio }}</td>

                                            <td>
                                                <a class="btn btn-sm btn-primary" href="{{ route('consultas.editDetail',$consulta->id) }}"><i class="fa fa-fw fa-eye"></i> Detalle Atención</a>
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

@section('scripts')
<script>
    $(function(){
        $(".deler").click(function(){
            if(confirm("¿Desea eliminar la consulta?")){
                $(this).parent().submit();
            }
        });
    });
</script>
@endsection
