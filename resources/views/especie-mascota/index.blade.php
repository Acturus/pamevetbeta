@extends('layouts.app')

@section('template_title')
    Especie Mascota
@endsection

@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-12">
                <div class="card">
                    <div class="card-header">
                        <div style="display: flex; justify-content: space-between; align-items: center;">

                            <span id="card_title">
                                {{ __('Especie Mascota') }}
                            </span>

                             <div class="float-right">
                                <a href="{{ route('especie-mascotas.create') }}" class="btn btn-primary btn-sm float-right"  data-placement="left">
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
                                        
										<th>Nombre</th>
										<th>Tipo</th>
										<th>Nombre Cientifico</th>
										<th>Peligro Extincion</th>

                                        <th></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($especieMascotas as $especieMascota)
                                        <tr>
                                            <td>{{ ++$i }}</td>
                                            
											<td>{{ $especieMascota->nombre }}</td>
											<td>{{ $especieMascota->tipo }}</td>
											<td>{{ $especieMascota->nombre_cientifico }}</td>
											<td>{{ $especieMascota->peligro_extincion }}</td>

                                            <td>
                                                <form action="{{ route('especie-mascotas.destroy',$especieMascota->id) }}" method="POST">
                                                    <a class="btn btn-sm btn-primary " href="{{ route('especie-mascotas.show',$especieMascota->id) }}"><i class="fa fa-fw fa-eye"></i> Show</a>
                                                    <a class="btn btn-sm btn-success" href="{{ route('especie-mascotas.edit',$especieMascota->id) }}"><i class="fa fa-fw fa-edit"></i> Edit</a>
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
                {!! $especieMascotas->links() !!}
            </div>
        </div>
    </div>
@endsection
