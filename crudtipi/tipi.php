<?php
include_once '/bd/conexion.php';
$objeto = new Conexion();
$conexion = $objeto->Conectar();

$consulta = "SELECT id, familia_sub_familia, formulario, nombre_causa, sub_familia, tipo_de_caso, tips FROM tipificaciones";
$resultado = $conexion->prepare($consulta);
$resultado->execute();
$data=$resultado->fetchAll(PDO::FETCH_ASSOC);
?>

<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="shortcut icon" href="#" />  
    <title>Tipificaciones</title>
      
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="bootstrap/css/bootstrap.min.css">
    <!-- CSS personalizado --> 
    <link rel="stylesheet" href="main.css">  
      
      
    <!--datables CSS básico-->
    <link rel="stylesheet" type="text/css" href="datatables/datatables.min.css"/>
    <!--datables estilo bootstrap 4 CSS-->  
    <link rel="stylesheet"  type="text/css" href="./datatables/DataTables-1.11.5/css/dataTables.bootstrap4.min.css">       
  </head>
    
  <body> 
     <header>
<!--         <h3 class="text-center text-light">Tutorial</h3>-->
         <h4 class="text-center text-light"> Tpificacciones<span class="badge badge-success">RRSS</span></h4> 
     </header>    
      
    <div class="container">
        <div class="row">
            <div class="col-lg-12">            
            <button id="btnnuevo" type="button" class="btn btn-success" data-toggle="modal">Nuevo</button>    
            </div>    
        </div>    
    </div>    
    <br>  
    <div class="container">
        <div class="row">
                <div class="col-lg-12">
                    <div class="table-responsive">        
                        <table id="tablatipificaciones" class="table table-striped table-bordered table-condensed" >
                        <thead class="text-center">
                            <tr>
                                <th>Id</th>
                                <th>familia_sub_familia</th>
                                <th>formulario</th>                                
                                <th>nombre_causa</th>
                                <th>sub_familia</th>
                                <th>tipo_de_caso</th> 
                                <th>tips</th>       
                                <th>Acciones</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php                            
                            foreach($data as $dat) {                                                        
                            ?>
                            <tr>
                                <td><?php echo $dat['id'] ?></td>
                                <td><?php echo $dat['familia_sub_familia'] ?></td>
                                <td><?php echo $dat['formulario'] ?></td>
                                <td><?php echo $dat['nombre_causa'] ?></td> 
                                <td><?php echo $dat['sub_familia'] ?></td>
                                <td><?php echo $dat['tipo_de_caso'] ?></td>
                                <td><?php echo $dat['tips'] ?></td>   
                                <td></td>
                            </tr>
                            <?php
                                }
                            ?>                                
                        </tbody>        
                       </table>                    
                    </div>
                </div>
        </div>  
    </div>    
      
<!--Modal para CRUD-->
<div class="modal fade" id="modalCRUD" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel"></h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span>
                </button>
            </div>
        <form id="formtipificaciones">    
            <div class="modal-body">
                <div class="form-group">
                <label for="familia_sub_familia" class="col-form-label">familia_sub_familia:</label>
                <input type="text" class="form-control" id="familia_sub_familia">
                </div>
                <div class="form-group">
                <label for="formulario" class="col-form-label">formulario:</label>
                <input type="text" class="form-control" id="formulario">
                </div>                
                <div class="form-group">
                <label for="nombre_causa" class="col-form-label">nombre_causa:</label>
                <input type="text" class="form-control" id="nombre_causa">
                </div>  
                <div class="form-group">
                <label for="sub_familia" class="col-form-label">sub_familia:</label>
                <input type="text" class="form-control" id="sub_familia">
                </div>   
                <div class="form-group">
                <label for="tipo_de_caso" class="col-form-label">tipo_de_caso:</label>
                <input type="text" class="form-control" id="tipo_de_caso">
                </div>   
                <div class="form-group">
                <label for="tips" class="col-form-label">tips:</label>
                <input type="text" class="form-control" id="tips">
                </div>             
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-light" data-dismiss="modal">Cancelar</button>
                <button type="submit" id="btnGuardar" class="btn btn-dark">Guardar</button>
            </div>
        </form>    
        </div>
    </div>
</div>  
  <!-- jQuery, popper ,js, bootstrap js-->
  <script src="jquery/jquery-3.6.0.min.js"></script>
<script src="popper/popper.min.js"></script>
<script src="bootstrap/js/bootstrap.min.js"></script>


<script type="text/javascript" src="datatables/datatables.min.js"></script>
<script type="text/javascript" src="main.js"></script>

   
    </body>
    </html>

