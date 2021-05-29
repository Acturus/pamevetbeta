@extends('layouts.app')

@section('template_title')
    Proveedores
@endsection

@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-12">
                <div class="card">
                    <div class="card-header">
                        <div style="display: flex; justify-content: space-between; align-items: center;">

                            <span id="card_title">
                                {{ __('Proveedores') }}
                            </span>

                            <div class="float-right">
                                <a href="{{ route('providers.create') }}" class="btn btn-primary btn-sm float-right"  data-placement="left">
                                    {{ __('Agregar Proveedor') }}
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
                                        
										<th>Nombre</th>
										<th>Nombre Contacto</th>
										<th>Correo Contacto</th>
										<th>Número Contacto</th>

                                        <th></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($providers as $provider)
                                        <tr>
                                            <td>{{ $loop->index + 1 }}</td>
                                            
											<td>{{ $provider->nombre }}</td>
											<td>{{ $provider->contacto }}</td>
											<td>{{ $provider->correo }}</td>
											<td>{{ $provider->numero }}</td>

                                            <td>
                                                <form action="{{ route('providers.destroy',$provider->id) }}" method="POST">
                                                    <a class="btn btn-sm btn-primary " href="{{ route('providers.show',$provider->id) }}"><i class="fa fa-fw fa-eye"></i> Ver</a>
                                                    <a class="btn btn-sm btn-success" href="{{ route('providers.edit',$provider->id) }}"><i class="fa fa-fw fa-edit"></i> Editar</a>
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="button" class="btn btn-danger btn-sm deler"><i class="fa fa-fw fa-trash"></i> Eliminar</button>
                                                </form>
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
            if(confirm("¿Desea eliminar el servicio?")){
                $(this).parent().submit();
            }
        });
    });
</script>
@endsection
