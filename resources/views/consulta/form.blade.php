@section('estilos')
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
            {{ Form::label('id_servicio', 'Servicio a Brindar') }}
            {{ Form::select('id_servicio', array_column($servicios->toArray(), 'nombre', 'id'), $consulta->id_servicio, ['class' => 'form-control' . ($errors->has('id_servicio') ? ' is-invalid' : ''), 'placeholder' => '- seleccione -']) }}
            {!! $errors->first('id_servicio', '<div class="invalid-feedback">:message</p>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('id_cliente', 'Cliente') }}
            {{ Form::select('id_cliente', array_column($clientes->toArray(), 'fullname', 'id'), $consulta->id_cliente, ['class' => 'form-control' . ($errors->has('id_cliente') ? ' is-invalid' : ''), 'placeholder' => '- seleccione -']) }}
            {!! $errors->first('id_cliente', '<div class="invalid-feedback">:message</p>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('id_mascota', 'Mascota que va recibir servicio') }}
            {{ Form::select('id_mascota', array_column($mascotas->toArray(), 'nombre', 'id'), $consulta->id_mascota, ['class' => 'form-control' . ($errors->has('id_cliente') ? ' is-invalid' : ''), 'placeholder' => '- seleccione -', 'disabled' => true]) }}
            {!! $errors->first('id_mascota', '<div class="invalid-feedback">:message</p>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('id_usuario', 'Encargado de atención') }}
            {{ Form::select('id_usuario', array_column($usuarios->toArray(), 'fullname', 'id'), $consulta->id_usuario, ['class' => 'form-control' . ($errors->has('id_cliente') ? ' is-invalid' : ''), 'placeholder' => '- seleccione -']) }}
            {!! $errors->first('id_usuario', '<div class="invalid-feedback">:message</p>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('inicio','Fecha y Horario de Atención') }}
            {{ Form::text('inicio', $consulta->inicio, ['class' => 'form-control' . ($errors->has('inicio') ? ' is-invalid' : ''), 'placeholder' => 'Inicio', 'autocomplete'=>'off']) }}
            {!! $errors->first('inicio', '<div class="invalid-feedback">:message</p>') !!}
        </div>
    </div>
    <div class="box-footer mt20">
        <button type="submit" class="btn btn-primary">Guardar</button>
    </div>
</div>
@section('scripts')
    <script src="https://cdn.jsdelivr.net/npm/gijgo@1.9.13/js/gijgo.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/gijgo@1.9.13/js/messages/messages.es-es.js"></script>
    <script>
        const mascotas = @json($mascotas->toArray());

        if($("#id_mascota").val()!='') $("#id_mascota").removeAttr('disabled');
        if($("#id_cliente").val()!='') $("#id_cliente").attr('disabled', true);

        $(function(){
            $("#id_cliente").change(function(){
                let idcli = this.value;
                let suspets = mascotas.filter(item=>item.id_cliente == idcli).map(item=>item.id);

                $("#id_mascota").val('').removeAttr('disabled');
                $("#id_mascota option").slice(1).hide();
                $("#id_mascota option").each((i,item) => { if(suspets.includes(item.value*1)) $(item).show() });
            });

            $('#inicio').datetimepicker({
                uiLibrary: 'bootstrap4',
                locale: 'es-es',
                footer : true,
                format: 'dd/mm/yyyy hh:MM tt'
            });
        });
    </script>
@endsection
