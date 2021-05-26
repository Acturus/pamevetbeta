@section('estilos')
    <link rel="stylesheet" href="{{ asset('css/image-uploader.css') }}">
@endsection

<div class="box box-info padding-1">
    <div class="box-body">
        
        <div class="form-group">
            {{ Form::label('nombre') }}
            {{ Form::text('nombre', $producto->nombre, ['class' => 'form-control' . ($errors->has('nombre') ? ' is-invalid' : ''), 'placeholder' => 'Nombre']) }}
            {!! $errors->first('nombre', '<p class="invalid-feedback">:message</p>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('marca') }}
            {{ Form::text('marca', $producto->marca, ['class' => 'form-control' . ($errors->has('marca') ? ' is-invalid' : ''), 'placeholder' => 'Marca']) }}
            {!! $errors->first('marca', '<p class="invalid-feedback">:message</p>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('unidad_medida') }}
            {{ Form::select('unidad_medida', ['gramos' => 'gramos(g)', 'kilos' => 'kilos(kg)', 'unidad' => 'unidad (und)'], $producto->unidad_medida, ['class' => 'form-control' . ($errors->has('unidad_medida') ? ' is-invalid' : ''), 'placeholder' => '- seleccione -']) }}
            {!! $errors->first('unidad_medida', '<p class="invalid-feedback">:message</p>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('descripcion', 'Descripción') }}
            {{ Form::textarea('descripcion', $producto->descripcion, ['class' => 'form-control' . ($errors->has('descripcion') ? ' is-invalid' : ''), 'placeholder' => 'Descripción']) }}
            {!! $errors->first('descripcion', '<p class="invalid-feedback">:message</p>') !!}
        </div>
        <div class="form-group row">
            <div class="col-6">
                {{ Form::label('cantidad') }}
                {{ Form::number('cantidad', $producto->cantidad, ['class' => 'form-control' . ($errors->has('cantidad') ? ' is-invalid' : ''), 'placeholder' => 'Cantidad', 'min'=>'0', 'step'=>'0.1']) }}
                {!! $errors->first('cantidad', '<p class="invalid-feedback">:message</p>') !!}
            </div>
            <div class="col-6">
                {{ Form::label('costo_unidad') }}
                {{ Form::number('costo_unidad', $producto->costo_unidad, ['class' => 'form-control' . ($errors->has('costo_unidad') ? ' is-invalid' : ''), 'placeholder' => 'Costo Unidad', 'min'=>'0.1', 'step'=>'0.1']) }}
                {!! $errors->first('costo_unidad', '<p class="invalid-feedback">:message</p>') !!}
            </div>
        </div>
        <div class="form-group">
            {{ Form::label('fotos') }}
            {{-- <input type="file" name="fotos[]" id="fotos" multiple accept="image/*" class="form-control {{ $errors->has('fotos') ? ' is-invalid' : '' }}"> --}}
            <div id="multifile" class="{{ $errors->has('fotos') ? ' is-invalid' : '' }}"></div>
            @if(Route::is('productos.edit'))
                <p class="text-muted"><small>Tenga en cuenta que las fotografías que suba durante la edición reemplazarán a las actuales, si no desea modificarlas puede dejar este campo en blanco</small></p>
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
                maxFiles: 3,
                imagesInputName:'fotos',
            });
        });
    </script>
@endsection