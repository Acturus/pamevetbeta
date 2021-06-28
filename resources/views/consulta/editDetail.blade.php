@section("estilos")
<style>
.tox-statusbar__branding{display:none}
.tox-statusbar__text-container{visibility:hidden;}
</style>
@endsection

@extends('layouts.app')

@section('template_title')
    Detalle de Consulta
@endsection

@section('content')
    <section class="content container-fluid">
        <div class="">
            <div class="col-md-12">

                @includeif('partials.errors')

                <div class="card card-default">
                    <div class="card-header">
                        <span class="card-title">Detalle de Consulta</span>
                    </div>
                    <div class="card-body">
                        <form method="POST" action="{{ route('consultas.saveDetail', $consulta->id) }}"  role="form" enctype="multipart/form-data">
                            {{ method_field('PATCH') }}
                            @csrf

                            <div class="form-group">
                                {{ Form::label('detalle', 'Detalle de Consulta') }}
                                {{ Form::textarea('detalle', $consulta->detalle, ['class' => 'form-control' . ($errors->has('detalle') ? ' is-invalid' : ''), 'placeholder' => 'Indique el detalle']) }}
                                {!! $errors->first('detalle', '<p class="invalid-feedback">:message</p>') !!}
                            </div>

                            <div class="box-footer mt20">
                                <button type="submit" class="btn btn-primary">Guardar</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection

@section("scripts")
<script src="https://cdn.tiny.cloud/1/k2knlbgaypb01ww3nwrqubzlxoux4rc6oz1h26gudjy1rh99/tinymce/5/tinymce.min.js" referrerpolicy="origin"></script>
<script src="{{ asset('js/es_419.js') }}"></script>
<script>
    tinymce.init({
        selector: 'textarea#detalle',
        skin: 'bootstrap',
        plugins: 'lists, link',
        toolbar: 'undo redo | bold italic underline | alignleft aligncenter alignright alignjustify | outdent indent | bullist numlist link',
        menubar: false,
        language: 'es_419'
    });
</script>
@endsection
