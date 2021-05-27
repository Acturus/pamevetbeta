<div class="box box-info padding-1">
    <div class="box-body">
        
        <div class="form-group">
            {{ Form::label('documento_de_identidad', 'Documento de identidad') }}
            {{ Form::number('documento_de_identidad', $cliente->documento_de_identidad, ['class' => 'form-control' . ($errors->has('documento_de_identidad') ? ' is-invalid' : ''), 'placeholder' => 'DNI o CEX']) }}
            {!! $errors->first('documento_de_identidad', '<p class="invalid-feedback">:message</p>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('nombres') }}
            {{ Form::text('nombres', $cliente->nombres, ['class' => 'form-control' . ($errors->has('nombres') ? ' is-invalid' : ''), 'placeholder' => 'Nombres']) }}
            {!! $errors->first('nombres', '<p class="invalid-feedback">:message</p>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('apellidos') }}
            {{ Form::text('apellidos', $cliente->apellidos, ['class' => 'form-control' . ($errors->has('apellidos') ? ' is-invalid' : ''), 'placeholder' => 'Apellidos']) }}
            {!! $errors->first('apellidos', '<p class="invalid-feedback">:message</p>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('correo') }}
            {{ Form::email('correo', $cliente->correo, ['class' => 'form-control' . ($errors->has('correo') ? ' is-invalid' : ''), 'placeholder' => 'Correo']) }}
            {!! $errors->first('correo', '<p class="invalid-feedback">:message</p>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('celular') }}
            {{ Form::number('celular', $cliente->celular, ['class' => 'form-control' . ($errors->has('celular') ? ' is-invalid' : ''), 'placeholder' => 'Celular', 'min' => '900000000', 'max'=>'999999999']) }}
            {!! $errors->first('celular', '<p class="invalid-feedback">:message</p>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('direccion', 'Dirección') }}
            {{ Form::text('direccion', $cliente->direccion, ['class' => 'form-control' . ($errors->has('direccion') ? ' is-invalid' : ''), 'placeholder' => 'Direccion']) }}
            {!! $errors->first('direccion', '<p class="invalid-feedback">:message</p>') !!}
        </div>

    </div>
    <div class="box-footer mt20">
        <button type="submit" class="btn btn-primary">GUARDAR</button>
    </div>
</div>