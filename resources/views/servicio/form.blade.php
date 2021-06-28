@section('estilos')
    <link rel="stylesheet" href="{{ asset('css/image-uploader.css') }}">
@endsection

<div class="box box-info padding-1">
    <div class="box-body">

        <div class="form-group">
            {{ Form::label('nombre') }}
            {{ Form::text('nombre', $servicio->nombre, ['class' => 'form-control' . ($errors->has('nombre') ? ' is-invalid' : ''), 'placeholder' => 'Nombre']) }}
            {!! $errors->first('nombre', '<p class="invalid-feedback">:message</p>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('descripcion', 'Descripción') }}
            {{ Form::textarea('descripcion', $servicio->descripcion, ['class' => 'form-control' . ($errors->has('descripcion') ? ' is-invalid' : ''), 'placeholder' => 'Descripción']) }}
            {!! $errors->first('descripcion', '<p class="invalid-feedback">:message</p>') !!}
        </div>
        <div class="form-group row">
            <div class="col-6">
                {{ Form::label('costo') }}
                {{ Form::number('costo', $servicio->costo, ['class' => 'form-control' . ($errors->has('costo') ? ' is-invalid' : ''), 'placeholder' => 'Costo', 'min'=>'0.1', 'step'=>'0.1']) }}
                {!! $errors->first('costo', '<p class="invalid-feedback">:message</p>') !!}
            </div>
            <div class="col-6">
                <p>Duración Aproximada</p>
                <label>
                    {{ Form::selectRange('duracion_horas', 0, 6, $servicio->duracion_horas, ['class' => 'form-control w-auto d-inline' . ($errors->has('duracion_horas') ? ' is-invalid' : '')]) }} horas
                </label>
                <label class="ml-3">
                    {{ Form::select('duracion_minutos', ['15'=>'15','30'=>'30','45'=>'45','0','0'], $servicio->duracion_minutos, ['class' => 'form-control w-auto d-inline' . ($errors->has('duracion_minutos') ? ' is-invalid' : '')]) }} minutos
                </label>
                {!! $errors->first('duracion_horas', '<p class="invalid-feedback">:message</p>') !!}
                {!! $errors->first('duracion_minutos', '<p class="invalid-feedback">:message</p>') !!}
            </div>
        </div>
        <div class="form-group">
            {{ Form::label('foto') }}
            <div id="multifile" class="{{ $errors->has('foto') ? ' is-invalid' : '' }}"></div>
            @if(Route::is('servicios.edit'))
                <p class="text-muted"><small>Tenga en cuenta que la fotografía que suba durante la edición reemplazará a la actual, si no desea modificarla puede dejar este campo en blanco.</small></p>
            @endif
            {!! $errors->first('fotos', '<p class="invalid-feedback">:message</p>') !!}
        </div>
    </div>
    <div class="box-footer mt20">
        <button type="submit" class="btn btn-primary">GUARDAR</button>
    </div>
</div>

@section('scripts')
    <script src="{{ asset('js/image-uploader.js') }}"></script>
    <script>
        $(function(){
            $('#multifile').imageUploader({
                maxSize: 3145728,
                maxFiles: 1,
                imagesInputName:'foto',
            });
        });
    </script>
@endsection
