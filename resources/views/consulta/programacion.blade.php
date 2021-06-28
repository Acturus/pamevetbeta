@extends('layouts.app')

@section('estilos')
<link href='https://cdn.jsdelivr.net/npm/fullcalendar@5.8.0/main.min.css' rel='stylesheet' />
<script src='https://cdn.jsdelivr.net/npm/fullcalendar@5.8.0/main.min.js'></script>

@endsection

@section('template_title')
    Programación Consultas
@endsection

@section('content')
    <div id="calendario" class="p-3">

    </div>
@endsection

@section('scripts')
<script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.29.1/moment-with-locales.min.js" integrity="sha512-LGXaggshOkD/at6PFNcp2V2unf9LzFq6LE+sChH7ceMTDP0g2kn6Vxwgg7wkPP7AAtX+lmPqPdxB47A0Nz0cMQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
<script>
    $(function(){
        const consultas = @json($consultas->toArray());

        let calendar_data = []

        consultas.forEach((item) => {
            let event = {};
            event.title = item.user.nombres + " " + item.user.apellidos + " - " + item.servicio.nombre;
            event.start = moment(item.inicio).toISOString();
            event.end = moment(item.fin).toISOString();
            calendar_data.push(event);
        });

        var calendarEl = document.getElementById('calendario');
        var calendar = new FullCalendar.Calendar(calendarEl, {
            initialView: 'dayGridMonth'
        });
        calendar.render();
    });
</script>
@endsection
