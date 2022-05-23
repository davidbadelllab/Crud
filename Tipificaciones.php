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
	<title>Tipificaciones</title>
	<meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
	<script src="https://kit.fontawesome.com/18e932af55.js"></script>
	<link rel="stylesheet" href="css/bootstrap.min.css">
	<link rel="stylesheet" href="css/bootstrap-grid.min.css">
	<link rel="stylesheet" href="css/home.css">
	<script src="js/jquery-3.4.1.min.js"></script>
	<script src="js/bootstrap.min.js"></script>
	<script src="js/jquery-3.4.1.min.js"></script>
	<script src="js/buscartipi.js"></script>
</head>
<section class="cr">
   <a href="index.php">Cerrar Sesión</a>
   </section>
   <div class="img">
	   <section>
<img src="IMG/bienvenidos.gif"/>
</div>
<div class="txt">
    <h1>Elige bien la Tipificacion que utilizaras</h1>
      </div>
	  </section>
<body>
 <main class="ct">
	<input type="text" name="termino" id="termino" placeholder="Digite la palabra desea buscar...">
</main>
	<section class="content-area">
		<div class="table-area" id="tabla_resultados">
		</div>
	</section>
</body>
</html>
