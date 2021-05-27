<div class="box box-info padding-1">
    <div class="box-body">
        
        <div class="form-group">
            {{ Form::label('id_producto') }}
            {{ Form::text('id_producto', $stockProducto->id_producto, ['class' => 'form-control' . ($errors->has('id_producto') ? ' is-invalid' : ''), 'placeholder' => 'Id Producto']) }}
            {!! $errors->first('id_producto', '<p class="invalid-feedback">:message</p>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('cantidad') }}
            {{ Form::text('cantidad', $stockProducto->cantidad, ['class' => 'form-control' . ($errors->has('cantidad') ? ' is-invalid' : ''), 'placeholder' => 'Cantidad']) }}
            {!! $errors->first('cantidad', '<p class="invalid-feedback">:message</p>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('costo_unidad') }}
            {{ Form::text('costo_unidad', $stockProducto->costo_unidad, ['class' => 'form-control' . ($errors->has('costo_unidad') ? ' is-invalid' : ''), 'placeholder' => 'Costo Unidad']) }}
            {!! $errors->first('costo_unidad', '<p class="invalid-feedback">:message</p>') !!}
        </div>

    </div>
    <div class="box-footer mt20">
        <button type="submit" class="btn btn-primary">Submit</button>
    </div>
</div>