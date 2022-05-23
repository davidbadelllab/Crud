<!DOCTYPE html>
<html lang="es">
  <head>
    <meta charset="UTF-8" />
    <meta
      name="viewport"
      content="width=device-width, user-scalable=yes, initial-scale=1.0, maximum-scale=3.0, minimum-scale=1.0"
    />
    <link rel="stylesheet" href="css/normalize.css" />
    <title>BO</title>
    <link
      rel="stylesheet"
      href="https://use.fontawesome.com/releases/v5.6.3/css/all.css"
    />
    <link rel="stylesheet" href="css/rrss.css" />
    <link href="favicon.ico" rel="shortcut icon" type="image/x-icon" />
    </head>
    
   <body>
  <div class="img"> 
    <img src="IMG/giphy.gif">
    </div>
    <span>BO</span>
    <form class="formulario" action="validacionRRSS.php" method="post">
      <img
        style="display: block; margin: 0 auto 0 auto"
        src="IMG/iniciar-sesion.png"
        alt="descripción"
      />
      <div class="contenedor">
        <div class="input-contenedor">
          <i class="fas fa-envelope icon"></i>
          <input type="email" placeholder="Correo Electronico" name="usuario"/>
        </div>
        <div class="input-contenedor">
          <i class="fas fa-key icon"></i>
          <input type="password" placeholder="Contraseña" name="contraseña"/>
        </div>
        <input type="submit" value="Ingresar" class="button" />
        <br /><br />

        <img
          style="display: block; margin: 0 auto 0 auto"
          src="IMG/question.png"
          alt="descripción"
        />
        <p class="Pf">Recuerda Verificar la respuesta antes de responder</p>
      </div>
    </form>
  </body>
</html>
