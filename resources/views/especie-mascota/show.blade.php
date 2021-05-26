@extends('layouts.app')

@section('template_title')
    {{ $especieMascota->name ?? 'Show Especie Mascota' }}
@endsection

@section('content')
    <section class="content container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <div class="float-left">
                            <span class="card-title">Show Especie Mascota</span>
                        </div>
                        <div class="float-right">
                            <a class="btn btn-primary" href="{{ route('especie-mascotas.index') }}"> Back</a>
                        </div>
                    </div>

                    <div class="card-body">
                        
                        <div class="form-group">
                            <strong>Nombre:</strong>
                            {{ $especieMascota->nombre }}
                        </div>
                        <div class="form-group">
                            <strong>Tipo:</strong>
                            {{ $especieMascota->tipo }}
                        </div>
                        <div class="form-group">
                            <strong>Nombre Cientifico:</strong>
                            {{ $especieMascota->nombre_cientifico }}
                        </div>
                        <div class="form-group">
                            <strong>Peligro Extincion:</strong>
                            {{ $especieMascota->peligro_extincion }}
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
