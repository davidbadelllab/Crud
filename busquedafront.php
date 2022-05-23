<?php 

require_once "BD/conexion2.php";
$tabla="";
$termino= "";
if(isset($_POST['productos']))
{
	$termino=$mysqli->real_escape_string($_POST['productos']);
	$consulta="SELECT * FROM base_buscador_front WHERE 
	palabra_clave LIKE '%".$termino."%' OR
	guion LIKE '%".$termino."%' OR
	guia LIKE '%".$termino."%'";

	$consultaBD=$mysqli->query($consulta);
if($consultaBD->num_rows>=1){
	echo "
	<table class='responsive-table table table-hover table-bordered'>
	<thead>
	<tr>
	<th class='bg-info' scope='col'>PALABRA CLAVE</th>
	<th class='bg-info' scope='col'>GUIÓN</th>
	<th class='bg-info' scope='col'>GUIA</th>
	</tr>
	</thead><br>
	<tbody>";
	while($fila=$consultaBD->fetch_array(MYSQLI_ASSOC)){
		echo "<tr>
		<td>".$fila['palabra_clave']."</td>
		<td>".$fila['guion']."</td>
		<td>".$fila['guia']."</td>
		</tr>";
	}
	echo "</tbody>
	</table>";
}else{
	echo "<center><h4>No hemos encotrado ningun registro con la palabra "."<strong class='text-uppercase'>".$termino."</strong><h4><center>";
}
}


?>