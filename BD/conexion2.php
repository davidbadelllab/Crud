<?php 
$mysqli= new mysqli("localhost", "conowaea_validador", "Wq8wzlttq_dG", "conowaea_base_buscador_front");

if(mysqli_connect_errno())
{
	echo "Problemas al conectarse con la BD";
}
$mysqli->set_charset("utf8");
?>