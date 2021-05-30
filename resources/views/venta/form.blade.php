<div class="box box-info padding-1">
    <div class="box-body">
    
        <div class="form-group">
            {{ Form::label('id_estado') }}
            <select name="id_estado" id="id_estado" class="form-control {{ $errors->has('id_estado') ? ' is-invalid' : '' }}" required>
                <option value="1">Registrado</option>
                <option value="2">Aprobado</option>
                <option value="3">En camino</option>
                <option value="4">Entregado</option>
                <option value="5">Anulado</option>
            </select>
            {!! $errors->first('id_estado', '<p class="invalid-feedback">:message</p>') !!}
        </div>

    </div>
    <div class="box-footer mt20">
        <button type="submit" class="btn btn-primary">Guardar</button>
    </div>
</div>