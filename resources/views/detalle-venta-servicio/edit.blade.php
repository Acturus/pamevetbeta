@extends('layouts.app')

@section('template_title')
    Update Detalle Venta Servicio
@endsection

@section('content')
    <section class="content container-fluid">
        <div class="">
            <div class="col-md-12">

                @includeif('partials.errors')

                <div class="card card-default">
                    <div class="card-header">
                        <span class="card-title">Update Detalle Venta Servicio</span>
                    </div>
                    <div class="card-body">
                        <form method="POST" action="{{ route('detalle-venta-servicios.update', $detalleVentaServicio->id) }}"  role="form" enctype="multipart/form-data">
                            {{ method_field('PATCH') }}
                            @csrf

                            @include('detalle-venta-servicio.form')

                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
