@extends('layouts.app')

@section('template_title')
    Create Estado Venta
@endsection

@section('content')
    <section class="content container-fluid">
        <div class="row">
            <div class="col-md-12">

                @includeif('partials.errors')

                <div class="card card-default">
                    <div class="card-header">
                        <span class="card-title">Create Estado Venta</span>
                    </div>
                    <div class="card-body">
                        <form method="POST" action="{{ route('estado-ventas.store') }}"  role="form" enctype="multipart/form-data">
                            @csrf

                            @include('estado-venta.form')

                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
