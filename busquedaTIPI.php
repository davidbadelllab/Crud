<?php 

require_once "BD/conexiontipi.php";
$tabla="";
$termino= "";
if(isset($_POST['productos']))
{
	$termino=$mysqli->real_escape_string($_POST['productos']);
	$consulta="SELECT * FROM tipificaciones WHERE 
	familia_sub_familia LIKE '%".$termino."%' OR
	formulario LIKE'%".$termino."%' OR
    nombre_causa LIKE'%".$termino."%' OR
    sub_familia LIKE'%".$termino."%' OR
    tipo_de_caso LIKE'%".$termino."%' OR
	tips LIKE '%".$termino."%'";

	$consultaBD=$mysqli->query($consulta);
if($consultaBD->num_rows>=1){
	echo "
	<table class='responsive-table table table-hover table-bordered'>
	<thead>
	<tr>
	<th class='bg-info' scope='col'> Familia sub familia</th>
	<th class='bg-info' scope='col'>Formulario</th>
	<th class='bg-info' scope='col'>Nombre causa</th>
    <th class='bg-info' scope='col'>sub familia</th>
	<th class='bg-info' scope='col'>tipo de caso</th>
	<th class='bg-info' scope='col'>tips</th>
    </tr>
	</thead><br>
	<tbody>";
	while($fila=$consultaBD->fetch_array(MYSQLI_ASSOC)){
		echo "<tr>
		<td>".$fila['familia_sub_familia']."</td>
		<td>".$fila['formulario']."</td>
		<td>".$fila['nombre_causa']."</td>
        <td>".$fila['sub_familia']."</td>
		<td>".$fila['tipo_de_caso']."</td>
		<td>".$fila['tips']."</td>
		</tr>";
	}
	echo "</tbody>
	</table>";
}else{
	echo "<center><h4>No hemos encotrado ningun registro con la palabra "."<strong class='text-uppercase'>".$termino."</strong><h4><center>";
}
}


?>