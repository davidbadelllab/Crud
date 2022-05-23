<!-- Conexi贸n a la base de datos,
codificaci贸n de caracteres,
seleccion de base de datos. -->
<?php 


$conexion = mysqli_connect("localhost", "conowaea_validador", "Wq8wzlttq_dG") or  die("no conectado");

$conexion -> set_charset('utf8');

$conexion -> select_db("conowaea_loginfront") or die("Base de Datos no encontrada </br>");


 ?>