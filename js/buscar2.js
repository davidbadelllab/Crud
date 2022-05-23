
$(obtener_registros());
function obtener_registros(productos)
{
	$.ajax({
		url : 'busquedafront.php',
		type : 'POST',
		dataType : 'html',
		data : { productos: productos },
	})
	.done(function(resultado){
		$("#tabla_resultados").html(resultado);
	})
}

$(document).on('keyup', '#termino', function()
{
	var valorBusqueda=$(this).val();
	console.log(valorBusqueda)
	
	if (valorBusqueda!="")
	{
		obtener_registros(valorBusqueda);
	}
	else
	{
		obtener_registros();
	}
});