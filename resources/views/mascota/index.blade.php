@extends('layouts.app')

@section('estilos')
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/lightbox2/2.11.3/css/lightbox.min.css" integrity="sha512-ZKX+BvQihRJPA8CROKBhDNvoc2aDMOdAlcm7TUQY+35XYtrd3yh95QOOhsPDQY9QnKE0Wqag9y38OIgEvb88cA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
<style>.lb-data .lb-number{display: none !important;}</style>
@endsection

@section('template_title')
    Mascotas
@endsection

@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-12">
                <div class="card">
                    <div class="card-header">
                        <div style="display: flex; justify-content: space-between; align-items: center;">

                            <span id="card_title">
                                {{ __('Mascota') }}
                            </span>

                            <div class="float-right">
                                <a href="{{ route('mascotas.create') }}" class="btn btn-primary btn-sm float-right"  data-placement="left">
                                    {{ __('Registrar') }}
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
										<th>Nombre</th>
										<th>Sexo</th>
										<th>Especie</th>
										<th>Edad</th>
										<th>Fotos</th>

                                        <th></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($mascotas as $mascota)
                                        <tr>
                                            <td>{{ ++$i }}</td>
                                            
											<td>{{ $mascota->id_cliente }}</td>
											<td>{{ $mascota->nombre }}</td>
											<td>{{ $mascota->sexo ? 'macho' : 'hembra' }}</td>
											<td>{{ $mascota->id_especie }}</td>
											<td>{{ $mascota->fecha_nacimiento }}</td>
											<td>
                                                @foreach(explode(',', $mascota->fotos) as $urlfoto)
                                                    <a class="btn btn-sm btn-primary @if (!$loop->first) d-none @endif" href="{{ $urlfoto }}" data-lightbox="fotos{{ $i }}">Ver Fotos</a>
                                                @endforeach
                                            </td>
                                            <td>
                                                <form action="{{ route('mascotas.destroy',$mascota->id) }}" method="POST">
                                                    <a class="btn btn-sm btn-success" href="{{ route('mascotas.edit',$mascota->id) }}"><i class="fa fa-fw fa-edit"></i> Editar</a>
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
                {!! $mascotas->links() !!}
            </div>
        </div>
    </div>
@endsection

@section('scripts')
<script src="https://cdnjs.cloudflare.com/ajax/libs/lightbox2/2.11.3/js/lightbox.min.js" integrity="sha512-k2GFCTbp9rQU412BStrcD/rlwv1PYec9SNrkbQlo6RZCf75l6KcC3UwDY8H5n5hl4v77IDtIPwOk9Dqjs/mMBQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
<script>
    $(function(){
        $(".deler").click(function(){
            if(confirm("¿Desea eliminar la mascota?")){
                $(this).parent().submit();
            }
        });
    });
</script>
@endsection