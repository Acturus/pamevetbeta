<div class="box box-info padding-1">
    <div class="box-body">
        
        <div class="form-group">
            {{ Form::label('nombre') }}
            {{ Form::text('nombre', $especieMascota->nombre, ['class' => 'form-control' . ($errors->has('nombre') ? ' is-invalid' : ''), 'placeholder' => 'Nombre']) }}
            {!! $errors->first('nombre', '<div class="invalid-feedback">:message</p>') !!}
        </div>
        <div class="form-group">            
            {{ Form::label('tipo') }}
            {{ Form::select(
                'tipo',
                ['mamífero'=>'mamífero', 'pez'=>'pez', 'ave'=>'ave', 'reptil'=>'reptil', 'anfibio'=>'anfibio'],
                $especieMascota->tipo,
                ['class' => 'form-control' . ($errors->has('tipo') ? ' is-invalid' : ''), 'placeholder' => '- seleccione -'])
            }}
            {!! $errors->first('tipo', '<div class="invalid-feedback">:message</p>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('nombre_cientifico', 'Nombre Científico') }}
            {{ Form::text('nombre_cientifico', $especieMascota->nombre_cientifico, ['class' => 'form-control' . ($errors->has('nombre_cientifico') ? ' is-invalid' : ''), 'placeholder' => 'Nombre Cientifico']) }}
            {!! $errors->first('nombre_cientifico', '<div class="invalid-feedback">:message</p>') !!}
        </div>
        <div class="form-group">
            <p class="{{ $errors->has('peligro_extincion') ? ' is-invalid' : '' }}">¿Es un animal en peligro de extinción?</p>
            <label class="ml-4">{{ Form::radio('peligro_extincion', 1, $especieMascota->peligro_extincion??false) }} Si </label>
            <label class="ml-4">{{ Form::radio('peligro_extincion', 0, 1-(int)$especieMascota->peligro_extincion) }} No </label>
            {{-- {{ Form::text('peligro_extincion', $especieMascota->peligro_extincion, ['class' => 'form-control' . ($errors->has('peligro_extincion') ? ' is-invalid' : ''), 'placeholder' => 'Peligro Extincion']) }} --}}
            {!! $errors->first('peligro_extincion', '<div class="invalid-feedback">:message</p>') !!}
        </div>

    </div>
    <div class="box-footer mt20">
        <button type="submit" class="btn btn-primary">GUARDAR</button>
    </div>
</div>