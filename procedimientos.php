<?php
// seguridad de sesiones 
session_start();
$varsesion= $_SESSION['usuario'];
if($varsesion== null || $varsesion=''){
    echo "no tienes acceso";
    die();
}

?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=, initial-scale=1.0">
    <title>Procedimientos</title>
</head>
<body>
    <title>
        proceddimiento 1
    </title>
    <span> Nombre</span>
</body>
</html>