<div class="box box-info padding-1">
    <div class="box-body">
        
        <div class="form-group">
            {{ Form::label('nombres') }}
            {{ Form::text('nombres', $user->nombres, ['class' => 'form-control' . ($errors->has('nombres') ? ' is-invalid' : ''), 'placeholder' => 'Nombres']) }}
            {!! $errors->first('nombres', '<p class="invalid-feedback">:message</p>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('apellidos') }}
            {{ Form::text('apellidos', $user->apellidos, ['class' => 'form-control' . ($errors->has('apellidos') ? ' is-invalid' : ''), 'placeholder' => 'Apellidos']) }}
            {!! $errors->first('apellidos', '<p class="invalid-feedback">:message</p>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('email') }}
            {{ Form::email('email', $user->email, ['class' => 'form-control' . ($errors->has('email') ? ' is-invalid' : ''), 'placeholder' => 'Email']) }}
            {!! $errors->first('email', '<p class="invalid-feedback">:message</p>') !!}
        </div>
        {{-- <div class="form-group">
            {{ Form::label('estado') }}
            {{ Form::select('estado', ['1' => 'Activo', '0' => 'Inactivo'], $user->estado, ['class' => 'form-control' . ($errors->has('estado') ? ' is-invalid' : ''), 'placeholder' => '- seleccione -']) }}
            {!! $errors->first('estado', '<p class="invalid-feedback">:message</p>') !!}
        </div> --}}
        <div class="form-group">
            {{ Form::label('Roles') }}
            {{ Form::select('id_rol', ['1' => 'Administrador', '2' => 'Veterinario'], $user->id_rol, ['class' => 'form-control' . ($errors->has('id_rol') ? ' is-invalid' : ''), 'placeholder' => '- seleccione -']) }}
            {!! $errors->first('id_rol', '<p class="invalid-feedback">:message</p>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('Contraseña') }}
            @if(Route::is('users.edit'))
                <input type="password" name="password" id="password" disabled class="form-control {{ $errors->has('password') ? ' is-invalid' : '' }}" placeholder="Sin cambios">
                <button type="button" class="btn btn-sm btn-warning passman text-white">Cambiar Contraseña</button>
                <button type="button" class="btn btn-sm btn-danger passman" style="display:none">Cancelar Cambio</button>
            @else
                <input type="password" name="password" id="password" class="form-control {{ $errors->has('password') ? ' is-invalid' : '' }}" placeholder="Contraseña">
            @endif
            {!! $errors->first('password', '<p class="invalid-feedback">:message</p>') !!}
        </div>
    </div>
    <div class="box-footer mt20">
        <button type="submit" class="btn btn-primary">GUARDAR</button>
    </div>
</div>
@section('scripts')
<script>
    $(function(){
        $(".passman").click(function(){
            $(".passman").toggle();
            $("#password").attr('disabled', (_, valor) => !valor);
            $("#password").attr('placeholder', (_, texto) => texto == "Contraseña" ? "Sin Cambios" : "Contraseña");
            $("#password:not([disabled])").focus();
        });
    });
</script>
@endsection