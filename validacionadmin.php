<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="css/validar.css">
  <link href="favicon.ico" rel="shortcut icon" type="image/x-icon" />
  <title>Autication</title>
</head>
<body>
</body>
</html>
<?php
include('dbadmin.php');
$usuario=$_POST['usuario'];
$contraseña=$_POST['contraseña'];
session_start();
$_SESSION['usuario']=$usuario;


$consulta="SELECT*FROM admin where usuario='$usuario' and contraseña='$contraseña'";
$resultado=mysqli_query($conexion,$consulta);

$filas=mysqli_num_rows($resultado);

if($filas){
  
    header("location:Panel.php");

}else{
    ?>
    <?php
    include("loginadmin.php");

  ?>
  
 <div text-align: center;>
  <h1 class="bad" >Error de Autenticación por favor volver a intentar.</h1>
  </div>
  
  <?php
}


mysqli_free_result($resultado);
mysqli_close($conexion);
