@extends('layouts.app')

@section('template_title')
    Create Especie Mascota
@endsection

@section('content')
    <section class="content container-fluid">
        <div class="row">
            <div class="col-md-12">

                @includeif('partials.errors')

                <div class="card card-default">
                    <div class="card-header">
                        <span class="card-title">Create Especie Mascota</span>
                    </div>
                    <div class="card-body">
                        <form method="POST" action="{{ route('especie-mascotas.store') }}"  role="form" enctype="multipart/form-data">
                            @csrf

                            @include('especie-mascota.form')

                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
