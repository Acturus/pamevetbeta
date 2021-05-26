<div class="box box-info padding-1">
    <div class="box-body">
        
        <div class="form-group">
            {{ Form::label('id_cliente', 'Cliente') }}
            <select name="id_cliente" id="id_cliente" class="form-control {{ $errors->has('id_cliente') ? ' is-invalid' : '' }}">
                <option value=""> - seleccione - </option>
                @foreach ($clientes as $cliente)
                    <option @if ($mascota->id_cliente !== null && $mascota->id_cliente === $cliente->id) selected @endif value="{{ $cliente->id }}">{{ $cliente->nombres.' '.$cliente->apellidos }}</option>
                @endforeach
            </select>
            {!! $errors->first('id_cliente', '<div class="invalid-feedback">:message</p>') !!}
            {{-- 
            {{ Form::text('id_cliente', $mascota->id_cliente, ['class' => 'form-control' . ($errors->has('id_cliente') ? ' is-invalid' : ''), 'placeholder' => 'Id Cliente']) }}
                --}}
        </div>
        <div class="form-group">
            {{ Form::label('nombre') }}
            {{ Form::text('nombre', $mascota->nombre, ['class' => 'form-control' . ($errors->has('nombre') ? ' is-invalid' : ''), 'placeholder' => 'Nombre']) }}
            {!! $errors->first('nombre', '<div class="invalid-feedback">:message</p>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('sexo') }}
            {{ Form::text('sexo', $mascota->sexo, ['class' => 'form-control' . ($errors->has('sexo') ? ' is-invalid' : ''), 'placeholder' => 'Sexo']) }}
            {!! $errors->first('sexo', '<div class="invalid-feedback">:message</p>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('id_especie', 'Especie') }}
            <select name="id_especie" id="id_especie" class="form-control {{ $errors->has('id_especie') ? ' is-invalid' : '' }}">
                <option value=""> - seleccione - </option>
                @foreach ($especies as $especie)
                    <option @if ($mascota->id_especie !== null && $mascota->id_especie === $especie->id) selected @endif value="{{ $especie->id }}">{{ $especie->nombre }}</option>
                @endforeach
            </select>
        </div>
        <div class="form-group">
            {{ Form::label('edad') }}
            {{ Form::text('edad', $mascota->edad, ['class' => 'form-control' . ($errors->has('edad') ? ' is-invalid' : ''), 'placeholder' => 'Edad']) }}
            {!! $errors->first('edad', '<div class="invalid-feedback">:message</p>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('fotos') }}
            {{ Form::text('fotos', $mascota->fotos, ['class' => 'form-control' . ($errors->has('fotos') ? ' is-invalid' : ''), 'placeholder' => 'Fotos']) }}
            {!! $errors->first('fotos', '<div class="invalid-feedback">:message</p>') !!}
        </div>

    </div>
    <div class="box-footer mt20">
        <button type="submit" class="btn btn-primary">GUARDAR</button>
    </div>
</div>