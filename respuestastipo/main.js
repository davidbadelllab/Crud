$(document).ready(function(){
    tablapalabras = $("#tablapalabras").DataTable({
       "columnDefs":[{
        "targets": -1,
        "data":null,
        "defaultContent": "<div class='text-center'><div class='btn-group'><button class='btn btn-warning btnEditar'>Editar</button><button class='btn btn-danger btnBorrar'>Borrar</button></div></div>"  
       }],
        
        //Para cambiar el lenguaje a español
    "language": {
            "lengthMenu": "Mostrar _MENU_ registros",
            "zeroRecords": "No se encontraron resultados",
            "info": "Mostrando registros del _START_ al _END_ de un total de _TOTAL_ registros",
            "infoEmpty": "Mostrando registros del 0 al 0 de un total de 0 registros",
            "infoFiltered": "(filtrado de un total de _MAX_ registros)",
            "sSearch": "Buscar:",
            "oPaginate": {
                "sFirst": "Primero",
                "sLast":"Último",
                "sNext":"Siguiente",
                "sPrevious": "Anterior"
             },
             "sProcessing":"Procesando...",
        }
    });
    
$("#btnNuevo").click(function(){
    $("#formpalabras").trigger("reset");
    $(".modal-header").css("background-color", "#28a745");
    $(".modal-header").css("color", "white");
    $(".modal-title").text("Nuevo Agente");            
    $("#modalCRUD").modal("show");        
    id=null;
    opcion = 1; //alta
});    
    
var fila; //capturar la fila para editar o borrar el registro
    
//botón EDITAR    
$(document).on("click", ".btnEditar", function(){
    fila = $(this).closest("tr");
    id = parseInt(fila.find('td:eq(0)').text());
    familia = fila.find('td:eq(1)').text();
    palabra_clave = fila.find('td:eq(2)').text();
    scripts_redes = parseInt(fila.find('td:eq(3)').text());
    
    $("#familia").val(familia);
    $("#palabra_clave").val(palabra_clave);
    $("#scripts_redes").val(scripts_redes);
    opcion = 2; //editar
    
    $(".modal-header").css("background-color", "#007bff");
    $(".modal-header").css("color", "white");
    $(".modal-title").text("Editar palabras");            
    $("#modalCRUD").modal("show");  
    
});

//botón BORRAR
$(document).on("click", ".btnBorrar", function(){    
    fila = $(this);
    id = parseInt($(this).closest("tr").find('td:eq(0)').text());
    opcion = 3 //borrar
    var respuesta = confirm("¿Está seguro de eliminar el registro: "+id+"?");
    if(respuesta){
        $.ajax({
            url: "bd/crud.php",
            type: "POST",
            dataType: "json",
            data: {opcion:opcion, id:id},
            success: function(){
                tablapalabras.row(fila.parents('tr')).remove().draw();
            }
        });
    }   
});
    
$("#formpalabras").submit(function(e){
    e.preventDefault();    
    familia = $.trim($("#familia").val());
    palabra_clave = $.trim($("#palabra_clave").val());
    scripts_redes = $.trim($("#scripts_redes").val());    
    $.ajax({
        url: "bd/crud.php",
        type: "POST",
        dataType: "json",
        data: {familia:familia, palabra_clave:palabra_clave, scripts_redes:scripts_redes, id:id, opcion:opcion},
        success: function(data){  
            console.log(data);
            id = data[0].id;            
            familia = data[0].familia;
            palabra_clave = data[0].palabra_clave;
            scripts_redes = data[0].scripts_redes;
            if(opcion == 1){tablapalabras.row.add([id,familia,palabra_clave,scripts_redes]).draw();}
            else{tablapalabras.row(fila).data([id,familia,palabra_clave,scripts_redes]).draw();}            
        }        
    });
    $("#modalCRUD").modal("hide");    
    
});    
    
});