@section('estilos')
    <link rel="stylesheet" href="{{ asset('css/image-uploader.css') }}">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/gijgo@1.9.13/css/gijgo.min.css">
    <style>
        .gj-datepicker-bootstrap [role=right-icon] button {
            border-color: #bbb;
        }
        .gj-datepicker-bootstrap [role=right-icon] button .gj-icon {
            top: 12px;
            left: 14px;
        }
    </style>
@endsection

<div class="box box-info padding-1">
    <div class="box-body">
        
        <div class="form-group">
            {{ Form::label('nombre') }}
            {{ Form::text('nombre', $mascota->nombre, ['class' => 'form-control' . ($errors->has('nombre') ? ' is-invalid' : ''), 'placeholder' => 'Nombre']) }}
            {!! $errors->first('nombre', '<p class="invalid-feedback">:message</p>') !!}
        </div>

        <div class="form-group row">
            <div class="col-6">
                {{ Form::label('id_especie', 'Especie') }}
                <select name="id_especie" id="id_especie" class="form-control {{ $errors->has('id_especie') ? ' is-invalid' : '' }}">
                    <option value=""> - seleccione - </option>
                    @foreach ($especies as $especie)
                        <option @if ($mascota->id_especie !== null && $mascota->id_especie === $especie->id) selected @endif value="{{ $especie->id }}">{{ $especie->nombre }}</option>
                    @endforeach
                </select>
            </div>
            <div class="col-6">
                {{ Form::label('sexo') }}
                {{ Form::select('sexo', ['1' => 'Macho', '0' => 'Hembra'], $mascota->sexo, ['class' => 'form-control' . ($errors->has('sexo') ? ' is-invalid' : ''), 'placeholder' => '- seleccione -']) }}
                {!! $errors->first('sexo', '<p class="invalid-feedback">:message</p>') !!}
            </div>
        </div>

        <div class="form-group row">
            <div class="col-7">
                {{ Form::label('id_cliente', 'Cliente') }}
                <select name="id_cliente" id="id_cliente" class="form-control {{ $errors->has('id_cliente') ? ' is-invalid' : '' }}">
                    <option value=""> - seleccione - </option>
                    @foreach ($clientes as $cliente)
                        <option @if ($mascota->id_cliente !== null && $mascota->id_cliente === $cliente->id) selected @endif value="{{ $cliente->id }}">{{ $cliente->fullname }}</option>
                    @endforeach
                </select>
                {!! $errors->first('id_cliente', '<p class="invalid-feedback">:message</p>') !!}
            </div>
            <div class="col-5">
                {{ Form::label('fecha_nacimiento', 'Fecha de Nacimiento') }}
                <input type="text" readonly id="fecha_nacimiento" name="fecha_nacimiento" class="bg-white {{ $errors->has('fecha_nacimiento') ? ' is-invalid' : '' }}" placeholder="dd/mm/yyyy" value="{{ $mascota->fecha_nacimiento }}">
                {!! $errors->first('fecha_nacimiento', '<p class="invalid-feedback">:message</p>') !!}
            </div>
        </div>        
        <div class="form-group">
            {{ Form::label('fotos') }}
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
    <script src="https://cdn.jsdelivr.net/npm/gijgo@1.9.13/js/gijgo.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/gijgo@1.9.13/js/messages/messages.es-es.js"></script>
    <script>
        const hoy = new Date();

        $(function(){
            $('#multifile').imageUploader({
                maxSize: 3145728,
                maxFiles: 3,
                imagesInputName:'fotos',
            });

            $('#fecha_nacimiento').datepicker({
                uiLibrary: 'bootstrap4',
                locale: 'es-es',
                format: 'dd/mm/yyyy',
                maxDate: hoy
            });

            $('#fecha_nacimiento').click(function(){
                $(this).next().click();
            });
        });
    </script>
@endsection