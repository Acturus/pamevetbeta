@section('estilos')
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/gijgo@1.9.13/css/gijgo.min.css">
    <style>
        .gj-timepicker{
            border: 1px solid #bbb;
            padding: 10px;
        }

        .gj-timepicker input, .gj-timepicker input:focus{
            border: 0;
        }

        .gj-timepicker-md [role=right-icon] {
            right: 7px;
            top: 7px;
            font-size: 30px;
        }
    </style>
@endsection

<div class="box box-info padding-1">
    <div class="box-body">
        <div class="form-group">
            @php
                $base_states = ['Registrado','Aprobado'];
                $diff_states = $venta->tipo_entrega == 1 ? ['Disponible para recojo'] : ['En camino'];
                $track_states = array_merge([0], $base_states, $diff_states, ['Entregado','Anulado']);
                unset($track_states[0]);
            @endphp

            {{ Form::label('id_estado', 'Estado del Pedido') }}
            {{ Form::select('id_estado', $track_states, $venta->id_estado, ['class' => 'form-control' . ($errors->has('id_estado') ? ' is-invalid' : '')]) }}
            {!! $errors->first('id_estado', '<p class="invalid-feedback">:message</p>') !!}
        </div>

        <div class="form-group d-none" id="field_anulacion">
            {{ Form::label('motivo_anulacion', 'Motivo de Anulación') }}
            {{ Form::textarea('motivo_anulacion', $venta->motivo_anulacion, ['class' => 'form-control' . ($errors->has('descripcion') ? ' is-invalid' : ''), 'placeholder' => 'Detalle brevemente el motivo', 'readonly'=>true]) }}
            {!! $errors->first('motivo_anulacion', '<p class="invalid-feedback">:message</p>') !!}
        </div>

        <div class="form-group d-none" id="field_horaprox">
            {{ Form::label('hora_entrega', 'Hora de llegada aproximada') }}
            <input type="text" readonly id="hora_entrega" name="hora_entrega" class="bg-white {{ $errors->has('hora_entrega') ? ' is-invalid' : '' }}" placeholder="HH:mm" value="{{ substr($venta->hora_entrega,0,5) }}">
            {!! $errors->first('hora_entrega', '<p class="invalid-feedback">:message</p>') !!}
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
    $(function(){
        $("#id_estado option:selected").prevAll().attr('disabled', true);

        if($("#id_estado").val() == 5) $("#field_anulacion").removeClass('d-none');

        if($("#id_estado option:selected").text() == 'En camino') {
            $("#field_horaprox").removeClass('d-none');

            $('#hora_entrega').timepicker({
                format: 'HH:MM'
            });
        }

        $('#hora_entrega').click(function(){
            $(this).next().click();
        });

        $("#id_estado").change(function(){

            $("#field_anulacion, #field_horaprox").addClass('d-none');
            $("#motivo_anulacion").attr('readonly',true);

            if(this.value == 5){
                $("#field_anulacion").removeClass('d-none');
                $("#motivo_anulacion").removeAttr('readonly');
            }
            else if($("#id_estado option:selected").text() == 'En camino'){
                $("#field_horaprox").removeClass('d-none');

                $('#hora_entrega').timepicker({
                    format: 'HH:MM'
                });
            }
        });
    });
</script>
@endsection
