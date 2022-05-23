$(document).ready(function(){
    tablatipificaciones = $("#tablatipificaciones").DataTable({
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
    
$("#btnnuevo").click(function(){
    $("#formtipificaciones").trigger("reset");
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
    familia_sub_familia = fila.find('td:eq(1)').text();
    formulario = fila.find('td:eq(2)').text();
    nombre_causa = fila.find('td:eq(3)').text();
    sub_familia = fila.find('td:eq(4)').text();
    tipo_de_caso = fila.find('td:eq(5)').text();
    tips = parseInt(fila.find('td:eq(6)').text());
    
    
    $("#familia_sub_familia").val(familia_sub_familia);
    $("#formulario").val(formulario);
    $("#nombre_causa").val(nombre_causa);
    $("#sub_familia").val(sub_familia);
    $("#tipo_de_caso").val(tipo_de_caso);
    $("#tips").val(tips);
    opcion = 2; //editar
    
    $(".modal-header").css("background-color", "#007bff");
    $(".modal-header").css("color", "white");
    $(".modal-title").text("Editar Persona");            
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
                tablatipificaciones.row(fila.parents('tr')).remove().draw();
            }
        });
    }   
});
    
$("#formtipificaciones").submit(function(e){
    e.preventDefault();    
    familia_sub_familia = $.trim($("#familia_sub_familia").val());
    formulario = $.trim($("#formulario").val());
    nombre_causa = $.trim($("#nombre_causa").val());
    sub_familia = $.trim($("#sub_familia").val());   
    tipo_de_caso = $.trim($("#tipo_de_caso").val());   
    tips = $.trim($("#tips").val());      
    $.ajax({
        url: "bd/crud.php",
        type: "POST",
        dataType: "json",
        data: {familia_sub_familia:familia_sub_familia, formulario:formulario, nombre_causa:nombre_causa, sub_familia:sub_familia, tipo_de_caso:tipo_de_caso, tips:tips, id:id, opcion:opcion},
        success: function(data){  
            console.log(data);
            id = data[0].id;            
            familia_sub_familia = data[0].familia_sub_familia;
            formulario = data[0].formulario;
            nombre_causa = data[0].nombre_causa;
            sub_familia = data[0].sub_familia;
            tipo_de_caso = data[0].tipo_de_caso;
            tips = data[0].tips;
            if(opcion == 1){tablatipificaciones.row.add([id,familia_sub_familia,formulario,nombre_causa,sub_familia,tipo_de_caso,tips]).draw();}
            else{tablatipificaciones.row(fila).data([id,familia_sub_familia,formulario,nombre_causa,sub_familia,tipo_de_caso,tips]).draw();}            
        }        
    });
    $("#modalCRUD").modal("hide");    
    
});    
    
});