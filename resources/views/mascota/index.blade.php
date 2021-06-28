@php

    use Illuminate\Support\Str;

    function age($born)
    {
        $reference = new DateTime;

        $diff = $reference->diff(new DateTime($born));

        $age = ($d = $diff->d) ? ' y '.$d.' '.Str::plural('día', $d) : '';
        $age = ($m = $diff->m) ? ($age ? ', ' : ' y ').$m.' '.Str::plural('mes', $m).$age : $age;
        $age = ($y = $diff->y) ? $y.' '.Str::plural('año', $y).$age  : $age;

        return ($s = trim(trim($age, ', '), ' y ')) ? $s : 'Recién Nacido';
    }
@endphp

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
                                            <td>{{ $loop->index+1 }}</td>

											<td>{{ $mascota->cliente->nombres.' '.$mascota->cliente->apellidos }}</td>
											<td>{{ $mascota->nombre }}</td>
											<td>{{ $mascota->sexo ? 'macho' : 'hembra' }}</td>
											<td>{{ strtolower($mascota->especieMascota->nombre) }}</td>
											<td>{{ age($mascota->fecha_nacimiento) }}</td>
											<td>
                                                @foreach(explode(',', $mascota->fotos) as $urlfoto)
                                                    <a class="btn btn-sm btn-primary @if (!$loop->first) d-none @endif" href="{{ $urlfoto }}" data-lightbox="fotos{{ $loop->parent->index }}">Ver Fotos</a>
                                                @endforeach
                                            </td>
                                            <td>
                                                <a class="btn btn-sm btn-success" href="{{ route('mascotas.edit',$mascota->id) }}"><i class="fa fa-fw fa-edit"></i> Editar</a>
                                                @if (auth()->user()->id_rol == 2)
                                                <button type="button" class="btn btn-warning btn-sm" data-toggle="modal" data-target="#historia">
                                                    Ver Historia
                                                </button>
                                                @else
                                                <form action="{{ route('mascotas.destroy',$mascota->id) }}" method="POST" class="d-inline pl-2">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="button" class="btn btn-danger btn-sm deler"><i class="fa fa-fw fa-trash"></i> Eliminar</button>
                                                </form>
                                                @endif
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
    @if (auth()->user()->id_rol == 2)
    <div class="modal fade" id="historia" data-backdrop="static" data-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="staticBackdropLabel">Historia de Mascota</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <iframe src="" frameborder="0"></iframe>
                </div>
            </div>
        </div>
    </div>
    @endif
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
