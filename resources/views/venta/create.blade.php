@extends('layouts.app')

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

@section('template_title')
    Create Venta
@endsection

@section('content')
    <section class="content container-fluid">
        <div class="row">
            <div class="col-md-12">

                @includeif('partials.errors')

                <div class="card card-default" id="app">
                    <div class="card-header">
                        <span class="card-title">Create Venta</span>
                    </div>

                    <div class="p-4" v-if="errors">
                        <div class="alert alert-danger" v-for="(error,key) in errors">
                            <p>@{{ key }}</p>
                            <ul>
                                <li v-for="subError in error">@{{ subError }}</li>
                            </ul>
                        </div>
                    </div>

                    <div class="p-4">
                        <form>
                            <div class="form-group">
                                <label for="id_cliente">Cliente</label>
                                <select name="id_cliente" id="id_cliente" required v-model="body.id_cliente"
                                    class="form-control {{ $errors->has('id_cliente') ? ' is-invalid' : '' }}">
                                    <option selected value="">SELECCIONE</option>
                                    @foreach ($clientes as $cliente)
                                        <option :value="{{ $cliente->id }}">
                                            {{ $cliente->nombres . ' ' . $cliente->apellidos }}</option>
                                    @endforeach
                                </select>
                                {!! $errors->first('id_cliente', '<p class="invalid-feedback">:message</p>') !!}
                            </div>
                            <div class="form-group row">
                                <div class="col-7">
                                    <label for="tipo_entrega">Tipo de Entrega</label>
                                    <select name="tipo_entrega" id="tipo_entrega" required v-model="body.tipo_entrega"
                                        class="form-control {{ $errors->has('tipo_entrega') ? ' is-invalid' : '' }}">
                                        <option selected value="">SELECCIONE</option>
                                        <option :value="1">En tienda</option>
                                        <option :value="2">A domicilio</option>
                                    </select>
                                    {!! $errors->first('tipo_entrega', '<p class="invalid-feedback">:message</p>') !!}
                                </div>
                                <div class="col-5">
                                    {{ Form::label('fecha_entrega', 'Fechas de Entrega') }}
                                    <input type="text" readonly id="fecha_entrega" name="fecha_entrega" ref="fecha_entrega"
                                        class="bg-white {{ $errors->has('fecha_entrega') ? ' is-invalid' : '' }}"
                                        placeholder="dd/mm/yyyy">
                                    {!! $errors->first('fecha_entrega', '<p class="invalid-feedback">:message</p>') !!}
                                </div>
                            </div>
                        </form>
                    </div>

                    <div class="card-body">
                        <div id="accordion">
                            <div class="card">
                                <div class="card-header" id="headingOne">
                                    <h5 class="mb-0">
                                        <button class="btn btn-link" data-toggle="collapse" data-target="#collapseOne"
                                            aria-expanded="true" aria-controls="collapseOne">
                                            Agregar Productos
                                        </button>
                                    </h5>
                                </div>

                                <div id="collapseOne" class="collapse" aria-labelledby="headingOne"
                                    data-parent="#accordion">
                                    <div class="card-body">
                                        <form>
                                            <div class="form-group">
                                                <label for="id_producto">Producto</label>
                                                <select name="id_producto" id="id_producto" class="form-control" v-model="tempProduct.value">
                                                    <option value="">Seleccione</option>
                                                    @foreach ($productos as $producto)
                                                        <option :value="[{{ $producto->id }},{{ $producto->costo_unidad }}]">{{ $producto->nombre }}
                                                        </option>
                                                    @endforeach
                                                </select>
                                            </div>
                                            <div class="form-group">
                                                <label for="producto.cantidad">Cantidad</label>
                                                <input class="form-control" type="number" id="producto.cantidad"  v-model="tempProduct.cant"
                                                    name="producto.cantidad">
                                            </div>
                                        </form>
                                        <div class="d-flex justify-content-end">
                                            <button class="btn btn-primary" v-on:click="addProduct"  :disabled="tempProduct.cant < 1">
                                                Agregar
                                            </button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="card">
                                <div class="card-header" id="headingTwo">
                                    <h5 class="mb-0">
                                        <button class="btn btn-link collapsed" data-toggle="collapse"
                                            data-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
                                            Agregar Servicio
                                        </button>
                                    </h5>
                                </div>
                                <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo"
                                    data-parent="#accordion">
                                    <div class="card-body">
                                        <form>
                                            <div class="form-group">
                                                <label for="id_producto">Servicio</label>
                                                <select name="id_producto" id="id_producto" class="form-control" v-model="tempService.value">
                                                    <option value="">Seleccione</option>
                                                    @foreach ($servicios as $servicio)
                                                        <option :value="[{{ $servicio->id }},{{ $servicio->costo }}]">{{ $servicio->nombre }}
                                                        </option>
                                                    @endforeach
                                                </select>
                                            </div>
                                            <div class="form-group">
                                                <label for="producto.cantidad">Cantidad</label>
                                                <input class="form-control" type="number" id="producto.cantidad" v-model="tempService.cant"
                                                    name="producto.cantidad">
                                            </div>
                                        </form>
                                        <div class="d-flex justify-content-end">
                                            <button class="btn btn-primary"  v-on:click="addService" :disabled="tempService.cant < 1">
                                                Agregar
                                            </button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="p-4">
                        <div class="table-responsive">
                            <table class="table table-striped table-hover">
                                <thead class="thead">
                                    <tr>
                                        <th>Tipo</th>
                                        <th>Codigo</th>
                                        <th>Cantidad</th>
                                        <th>Precio Unit.</th>
                                        <th>Sub total</th>
                                        <th>Opciones</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr v-for="(detalle,index) in body.detalleServicio" :key="index">
                                        <td>Servicio</td>
                                        <td>@{{ detalle.id }}</td>
                                        <td>@{{ detalle.costo_unitario }}</td>
                                        <td>@{{ detalle.cantidad }}</td>
                                        <td>@{{ detalle.subtotal }}</td>
                                        <td><button class="btn btn-danger" v-on:click="deleteService(detalle.index)">Eliminar</button></td>
                                    </tr>
                                    <tr v-for="(detalle,index) in body.detalleProducto" :key="index">
                                        <td>Producto</td>
                                        <td>@{{ detalle.id }}</td>
                                        <td>@{{ detalle.costo_unitario }}</td>
                                        <td>@{{ detalle.cantidad }}</td>
                                        <td>@{{ detalle.subtotal }}</td>
                                        <td><button class="btn btn-danger" v-on:click="deleteProduct(detalle.index)">Eliminar</button></td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>

                    <div class="p-4" v-if="precioTotal > 0">
                        <p class="h5">
                            Resumen
                        </p>
                        <div>
                            <p>Precio total : @{{ precioTotal }}</p>
                        </div>
                        <div>
                            <button class="btn btn-primary" v-on:click="send" :disabled="loading">Guardar Venta</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection

@section('scripts')
    <script src="https://cdn.jsdelivr.net/npm/gijgo@1.9.13/js/gijgo.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/gijgo@1.9.13/js/messages/messages.es-es.js"></script>
    <script>
        const hoy = new Date();

        $(function() {

            $('#fecha_entrega').datepicker({
                uiLibrary: 'bootstrap4',
                locale: 'es-es',
                format: 'yyyy-mm-dd',
                maxDate: hoy
            });

            $('#fecha_entrega').click(function() {
                $(this).next().click();
            });
        });

    </script>
    <script src="https://unpkg.com/vue@next"></script>
    <script>
        const App = {
            data() {
                return {
                    loading : false,
                    errors : null,
                    body: {
                        _token : '{{ csrf_token() }}',
                        id_cliente: "",
                        tipo_entrega: "",
                        fecha_entrega: "",
                        detalleServicio: [],
                        detalleProducto: [],
                    },
                    tempService : {
                        value : "",
                        cant : 0
                    },
                    tempProduct  :{
                        value : "",
                        cant : 0 
                    }
                }
            },
            computed :{
                precioTotal(){
                    
                    let productos = 0
                    this.body.detalleProducto.forEach(elm => {
                        productos += elm.subtotal
                    })

                    let servicios = 0
                    this.body.detalleServicio.forEach(elm => {
                        servicios += elm.subtotal
                    })
                    
                    return productos + servicios
                }
            },
            methods :{
                addService(){
                    if(this.tempService.value === "" || this.tempService.cant === 0){
                        alert('Seleccione un servicio y una cantidad mayor a 0')
                        return
                    }

                    this.body.detalleServicio.push({
                        id : this.tempService.value[0],
                        costo_unitario : this.tempService.value[1],
                        cantidad : this.tempService.cant,
                        subtotal : parseFloat((this.tempService.cant * this.tempService.value[1]).toFixed(2))
                    })
                },
                deleteService(index){
                    this.body.detalleServicio.splice(index,1);
                },
                addProduct(){
                    if(this.tempProduct.value === "" || this.tempProduct.cant === 0){
                        alert('Seleccione un servicio y una cantidad mayor a 0')
                        return
                    }

                    this.body.detalleProducto.push({
                        id : this.tempProduct.value[0],
                        costo_unitario : this.tempProduct.value[1],
                        cantidad : this.tempProduct.cant,
                        subtotal : parseFloat((this.tempProduct.cant * this.tempProduct.value[1]).toFixed(2))
                    })
                },
                deleteProduct(index){
                    this.body.detalleProducto.splice(index,1);
                },
                validateForm(){
                    if(this.body.id_cliente === ""){
                        return "Seleccione un cliente"
                    }

                    if(this.body.tipo_entrega === ""){
                        return "Seleccione un tipo de entrega"
                    }

                    if(this.$refs.fecha_entrega.value === ""){
                        return 'Seleccione una fecha de entrega'
                    }


                    if(this.body.detalleProducto.length <= 0 && this.body.detalleServicio.length <= 0 ){
                        return "agrege un Producto o Servicio"
                    }

                    return -1;
                },
                send(){

                    const message = this.validateForm()

                    if(message !== -1){
                        alert(message)
                        return
                    }

                    this.loading = true

                    this.body.fecha_entrega = this.$refs.fecha_entrega.value

                    fetch('{{ route('ventas.store') }}',{
                        method : 'post',
                        body : JSON.stringify(this.body),
                        headers : {
                            "content-type" : "Application/json",
                            "Accept" : "Application/json"
                        }
                    })
                    .then(data => data.json())
                    .then(response => {
                        this.loading = false;

                        if(response.errors){
                            this.errors = response.errors
                            return
                        }

                        alert('La venta se creó con satisfactoriamente, será redirigido al listado')

                        window.location.href = '{{ route("ventas.index") }}'

                    })
                }
            }
        }

        Vue.createApp(App).mount('#app')

    </script>
@endsection
