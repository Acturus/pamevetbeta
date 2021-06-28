<?php

$script = '';

if(isset($_POST['login']) && isset($_POST['code']) && isset($_POST['field'])){

    $login = $_POST['login'];
    $code = $_POST['code'];
    $field = $_POST['field'];

    $mysqli = new mysqli("localhost", "root", '', "pamevetbeta");
    $mysqli->set_charset('utf8');
    $mysqli->query('SET time_zone = "-05:00"');

    $consulta = $mysqli->query("SELECT id FROM ventas WHERE codigo='$code' AND id_cliente = (SELECT id FROM clientes WHERE $login = '$field')");

    if ($consulta->num_rows) {
        session_start();
        $idventa = $consulta->fetch_row();
        $_SESSION['idventa'] = $idventa[0];
        header("Location: info.php", true, 303);
    }
    else{
        $script = '<script>setTimeout(()=>{alert("El usuario y/o el código de pedido no son correctos")},300);</script>';
    }
}

?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tracking de Pedido</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="css/login.css">
    <style>
        .WatsonAssistantChatHost{position: fixed}
    </style>
</head>
<body class="py-5 d-flex align-items-center justify-content-center">
    <div class="loading d-none" id="pageloader"></div>
    <form class="form-signin w-100 p-3 mx-auto rounded-lg" method="POST">
        <h1 class="h2 my-3 text-center">Tracking de Pedido</h1>

        <p class="mb-0 pl-2">Seleccione con que desea identificarse:</p>

        <label for="login" class="sr-only">Ingresar con:</label>
        <select name="login" id="login" class="form-control">
            <option value="documento_de_identidad">DNI</option>
            <option value="celular">Celular</option>
            <option value="correo">Correo</option>
        </select>

        <br>
        <label for="field" class="sr-only">Field</label>
        <input type="text" name="field" id="field" class="form-control" placeholder="Ingrese" required>

        <label for="code" class="sr-only">Código de Pedido</label>
        <input type="password" name="code" id="code" class="form-control" placeholder="Código de Pedido" required>

        <button class="btn btn-lg btn-success btn-block" type="submit">Ingresar</button>
    </form>
    <?php echo $script; ?>
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
