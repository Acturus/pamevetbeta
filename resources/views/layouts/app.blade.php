<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>@section('template_title') Dashboard @show</title>    

    <link rel="stylesheet" href="{{ asset('css/themify-icons.css') }}">
    <link rel="stylesheet" href="{{ asset('css/vendor.bundle.base.css') }}">
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">

    @yield('estilos')
</head>
<body>
    <header>
        <nav class="navbar col-lg-12 col-12 p-0 fixed-top d-flex flex-row">
            <div class="text-center navbar-brand-wrapper d-flex align-items-center justify-content-center">
                <a class="navbar-brand brand-logo mr-5" href="/home"><img src="{{ asset('img/logo_large.png')}}" class="mr-2" alt="logo"/></a>
                <a class="navbar-brand brand-logo-mini" href="/home"><img src="{{ asset('img/logo_sm.png')}}" alt="logo"/></a>
            </div>
            <div class="navbar-menu-wrapper d-flex align-items-center justify-content-end">
                <button class="navbar-toggler navbar-toggler align-self-center" type="button" data-toggle="minimize">
                    <span class="ti-view-list"></span>
                </button>
                <ul class="navbar-nav navbar-nav-right">
                    <li class="nav-item dropdown mr-1">
                        <a class="nav-link count-indicator dropdown-toggle d-flex justify-content-center align-items-center" id="messageDropdown" href="#" data-toggle="dropdown">
                            <i class="ti-email mx-0"></i>
                        </a>
                        <div class="dropdown-menu dropdown-menu-right navbar-dropdown" aria-labelledby="messageDropdown">
                            <p class="mb-0 font-weight-normal float-left dropdown-header">Mensajes</p>
                            <p class="dropdown-item"><small class="text-muted">No hay nuevos mensajes</small></p>
                        </div>
                    </li>
                    <li class="nav-item dropdown">
                        <a class="nav-link count-indicator dropdown-toggle" id="notificationDropdown" href="#" data-toggle="dropdown">
                            <i class="ti-bell mx-0"></i>
                        </a>
                        <div class="dropdown-menu dropdown-menu-right navbar-dropdown" aria-labelledby="notificationDropdown">
                            <p class="mb-0 font-weight-normal float-left dropdown-header">Notificaciones</p>
                            <p class="dropdown-item"><small class="text-muted">No hay nuevas notificaciones</small></p>
                        </div>
                    </li>
                    <li class="nav-item nav-profile dropdown">
                        <a class="nav-link dropdown-toggle" href="#" data-toggle="dropdown" id="profileDropdown">
                        <img src="{{ asset('img/user.png')}}" alt="profile"/>
                        </a>
                        <div class="dropdown-menu dropdown-menu-right navbar-dropdown" aria-labelledby="profileDropdown">
                            <form class="dropdown-item p-0" action="{{ route('logout') }}" method="POST">
                                @csrf
                                <button class="btn btn-sm btn-link ml-4">Cerrar Sesión</button>
                            </form>
                        </div>
                    </li>
                </ul>
                <button class="navbar-toggler navbar-toggler-right d-lg-none align-self-center" type="button" data-toggle="offcanvas">
                    <span class="ti-view-list"></span>
                </button>
            </div>
        </nav>
    </header>
    <main class="container-fluid page-body-wrapper">
        <nav class="sidebar sidebar-offcanvas" id="sidebar">
            <ul class="nav">
                <li class="nav-item">
                    <a class="nav-link bg-success rounded-lg" href="/ventas/create">
                        <i class="ti-headphone-alt menu-icon text-white"></i>
                        <span class="menu-title text-white">Compra</span>
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link bg-primary rounded-lg" href="/clientes/create">
                        <i class="ti-user menu-icon text-white"></i>
                        <span class="menu-title text-white">Nuevo Cliente</span>
                    </a>
                </li>
                <li class="nav-item">
                    <hr>
                <li>
                <li class="nav-item">
                    <a class="nav-link" data-toggle="collapse" href="#ui-basic3" aria-expanded="false" aria-controls="ui-basic3">
                        <i class="ti-spray menu-icon"></i>
                        <span class="menu-title">Productos</span>
                        <i class="menu-arrow"></i>
                    </a>
                    <div class="collapse" id="ui-basic3">
                        <ul class="nav flex-column sub-menu">
                            <li class="nav-item">
                                <a class="nav-link" href="/productos">Gestion</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="/providers">Proveedores</a>
                            </li>
                        </ul>
                    </div>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="/servicios">
                        <i class="ti-cut menu-icon"></i>
                        <span class="menu-title">Servicios</span>
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="/clientes">
                        <i class="ti-stamp menu-icon"></i>
                        <span class="menu-title">Clientes</span>
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" data-toggle="collapse" href="#ui-basic2" aria-expanded="false" aria-controls="ui-basic2">
                        <i class="ti-github menu-icon"></i>
                        <span class="menu-title">Mascotas</span>
                        <i class="menu-arrow"></i>
                    </a>
                    <div class="collapse" id="ui-basic2">
                        <ul class="nav flex-column sub-menu">
                            <li class="nav-item">
                                <a class="nav-link" href="/mascotas">Listado</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="/especie-mascotas">Especies</a>
                            </li>
                        </ul>
                    </div>
                </li>
                <li class="nav-item">
                    <hr>
                <li>
                <li class="nav-item">
                    <a class="nav-link" href="/users">
                        <i class="ti-shield menu-icon"></i>
                        <span class="menu-title">Gestión de Usuarios</span>
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="/ventas">
                        <i class="ti-archive menu-icon"></i>
                        <span class="menu-title">Gestión de Ventas</span>
                    </a>
                </li>
            </ul>
        </nav>
        <section class="main-panel py-4">
            @yield('content')
        </section>
    </main>
    <script src="{{ asset('js/vendor.bundle.base.js') }}"></script>
    <script src="{{ asset('js/off-canvas.js') }}"></script>
    <script src="{{ asset('js/hoverable-collapse.js') }}"></script>
    <script src="{{ asset('js/template.js') }}"></script>
    @yield('scripts')
</body>
</html>
