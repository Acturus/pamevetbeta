<?php

    $mysqli = new mysqli("localhost", "root", '', "pamevetbeta");
    $mysqli->set_charset('utf8');
    $mysqli->query('SET time_zone = "-05:00"');

    $tabla = boolval($_GET['prod']) ? 'productos' : 'servicios';
    $col = boolval($_GET['prod']) ? 'fotos' : 'foto';
    $id = $_GET['id'];

    $qry = $mysqli->query("SELECT $col FROM $tabla WHERE id=$id");
    $row = $qry->fetch_row();
    $prefoto = explode(',',$row[0]);

    $foto = trim($prefoto[0]) ?: 'img/service_placeholder.png';

    $image = file_get_contents($_SERVER['REQUEST_SCHEME'].'://'.$_SERVER['HTTP_HOST'].'/'.$foto);
    $image_mime = image_type_to_mime_type(exif_imagetype($foto));

    header("Content-type: " . $image_mime);
    header("Content-Length: " . strlen($image));
    echo $image;

?>
