<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <title>Inicio de Sesión | Pamevet</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link href="https://fonts.googleapis.com/css?family=Karla:400,700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.materialdesignicons.com/4.8.95/css/materialdesignicons.min.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">
    <link rel="stylesheet" href="{{ asset('css/login.css') }}">
    <style>
        .WatsonAssistantChatHost{position: fixed}
    </style>
</head>
<body>
    <main class="d-flex align-items-center min-vh-100 py-3 py-md-0">
        <div class="container">
            <div class="card login-card w-75 mx-auto">
                <div class="row no-gutters">
                    <div class="col-md-5">
                        <img src="{{ asset('img/login_img.png')}}" alt="login" class="login-card-img">
                    </div>
                    <div class="col-md-7 pl-3">
                        <div class="card-body">
                            <div class="brand-wrapper text-center pr-5">
                                <img src="{{ asset('img/pamevet_logo.png')}}" alt="Logo Pamevet" class="logo">
                            </div>
                            <p class="login-card-description text-center pr-5">Ingreso al Sistema</p>
                            <form action="{{ route('login') }}" method="POST">
                                @csrf
                                <div class="form-group">
                                    <label for="email" class="sr-only">Email</label>
                                    <input type="email" name="email" id="email" required autofocus class="form-control @error('email') is-invalid @enderror" value="{{ old('email') }}" placeholder="Correo Electrónico">
                                    @error('email')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                                <div class="form-group mb-4">
                                    <label for="password" class="sr-only">Contraseña</label>
                                    <input type="password" name="password" id="password" class="form-control @error('password') is-invalid @enderror" placeholder="⁎⁎⁎⁎⁎⁎⁎⁎⁎⁎⁎⁎⁎">
                                    @error('password')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                                <div class="form-group pl-1">
                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>
                                        <label class="form-check-label" for="remember">Recordar mis credenciales</label>
                                    </div>
                                </div>
                                <input class="btn btn-block login-btn mb-3" type="submit" value="INGRESAR">
                                <a href="zonaclientes" class="btn btn-block btn-primary mb-4">ESTADO DE PEDIDO</a>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </main>
    <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"></script>
    <script>
        window.watsonAssistantChatOptions = {
            integrationID: "cf1e10a3-15d7-4cd9-9e5b-a7c8e5717e6a", // The ID of this integration.
            region: "us-south", // The region your integration is hosted in.
            serviceInstanceID: "32a20483-6783-4ade-82e1-7a4522db7804", // The ID of your service instance.
            onLoad: function(instance) { instance.render(); }
        };
        setTimeout(function(){
            const t=document.createElement('script');
            t.src="https://web-chat.global.assistant.watson.appdomain.cloud/loadWatsonAssistantChat.js";
            document.head.appendChild(t);
        });
    </script>
</body>
</html>
