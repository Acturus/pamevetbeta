@extends('layouts.app')

@section('template_title')
    Create Stock Producto
@endsection

@section('content')
    <section class="content container-fluid">
        <div class="row">
            <div class="col-md-12">

                @includeif('partials.errors')

                <div class="card card-default">
                    <div class="card-header">
                        <span class="card-title">Create Stock Producto</span>
                    </div>
                    <div class="card-body">
                        <form method="POST" action="{{ route('stock-productos.store') }}"  role="form" enctype="multipart/form-data">
                            @csrf

                            @include('stock-producto.form')

                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
