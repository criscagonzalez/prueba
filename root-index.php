<?php
session_start();
date_default_timezone_set('America/Bogota');  
require_once('modulos/config.php');
if(isset($_SESSION['usuario']))
{
?>
<!doctype html>
<html lang="es" data-bs-theme="auto">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="Paradoja">

    <title>Inicio</title>    
    
    <?php 
      require ("modulos/header-root.php");
    ?>
    
  </head>
  <body>
    <?php
      //if($_SESSION['usuario'] =)
      //{ 
        require("modulos/usuarios.php");
        require("modulos/popup-usuario.php");
        require("modulos/popup_mensajes.php");
      //}
    ?>
  </body>
  <script src="assets/dist/js/bootstrap.bundle.min.js"></script>
  <script src="js/sidebars.js"></script>
  <script src="js/fusuarios.js"></script>
  <script src="js/fglobales.js"></script>
</html>
<?php
  }
  else
  {
    header("Location: index.php", TRUE, 301);
    exit();
  }
?>
