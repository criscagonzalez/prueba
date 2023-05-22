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

    <title>Peliculas</title>    
    <link href="assets/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="icons/font/bootstrap-icons.css" rel="stylesheet">
    <link href="css/dashboard.css" rel="stylesheet">
    
  </head>
  <body>
    <?php
      if($_SESSION['tipo'] == 'admin')
      { 
        require("modulos/peliculas.php");
        require("modulos/popup-pelicula.php");
        require("modulos/popup_mensajes.php");
      }
    ?>
  </body>
  <script src="js/fpeliculas.js"></script>
  <script src="js/felenco.js"></script>
  <?php
    require("modulos/footer.php");
  ?>
</html>
<?php
  }
  else
  {
    header("Location: index.php", TRUE, 301);
    exit();
  }
?>
