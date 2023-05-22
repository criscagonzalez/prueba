<?php
session_start();
date_default_timezone_set('America/Bogota');  
if(!isset($_SESSION['usuario']) && !isset($_SESSION['clave']))
{
?>
  <!doctype html>
  <html lang="es" data-bs-theme="auto">
    <head><script src="assets/js/color-modes.js"></script>

      <meta charset="utf-8">
      <meta name="viewport" content="width=device-width, initial-scale=1">
      <meta name="description" content="">
      <meta name="author" content="Mark Otto, Jacob Thornton, and Bootstrap contributors">
      <meta name="generator" content="Hugo 0.111.3">
      <title>Iniciar Sesión</title>

      <link rel="canonical" href="https://getbootstrap.com/docs/5.3/examples/sign-in/">
      <link href="assets/dist/css/bootstrap.min.css" rel="stylesheet">
      

      <style>
        .bd-placeholder-img {
          font-size: 1.125rem;
          text-anchor: middle;
          -webkit-user-select: none;
          -moz-user-select: none;
          user-select: none;
        }

        @media (min-width: 768px) {
          .bd-placeholder-img-lg {
            font-size: 3.5rem;
          }
        }

        .b-example-divider {
          width: 100%;
          height: 3rem;
          background-color: rgba(0, 0, 0, .1);
          border: solid rgba(0, 0, 0, .15);
          border-width: 1px 0;
          box-shadow: inset 0 .5em 1.5em rgba(0, 0, 0, .1), inset 0 .125em .5em rgba(0, 0, 0, .15);
        }

        .b-example-vr {
          flex-shrink: 0;
          width: 1.5rem;
          height: 100vh;
        }

        .bi {
          vertical-align: -.125em;
          fill: currentColor;
        }

        .nav-scroller {
          position: relative;
          z-index: 2;
          height: 2.75rem;
          overflow-y: hidden;
        }

        .nav-scroller .nav {
          display: flex;
          flex-wrap: nowrap;
          padding-bottom: 1rem;
          margin-top: -1px;
          overflow-x: auto;
          text-align: center;
          white-space: nowrap;
          -webkit-overflow-scrolling: touch;
        }

        .btn-bd-primary {
          --bd-violet-bg: #712cf9;
          --bd-violet-rgb: 112.520718, 44.062154, 249.437846;

          --bs-btn-font-weight: 600;
          --bs-btn-color: var(--bs-white);
          --bs-btn-bg: var(--bd-violet-bg);
          --bs-btn-border-color: var(--bd-violet-bg);
          --bs-btn-hover-color: var(--bs-white);
          --bs-btn-hover-bg: #6528e0;
          --bs-btn-hover-border-color: #6528e0;
          --bs-btn-focus-shadow-rgb: var(--bd-violet-rgb);
          --bs-btn-active-color: var(--bs-btn-hover-color);
          --bs-btn-active-bg: #5a23c8;
          --bs-btn-active-border-color: #5a23c8;
        }
        .bd-mode-toggle {
          z-index: 1500;
        }
      </style>

      
      <!-- Custom styles for this template -->
      <link href="assets/dist/css/sign-in.css" rel="stylesheet">
    </head>
    <body class="text-center">
      <main class="form-signin w-100 m-auto">
        <!--<form id = "login" action="modulos/validar.php" method="POST">--> 
          <img class="mb-4" src="assets/brand/bootstrap-logo.svg" alt="" width="72" height="57">
          <h1 class="h3 mb-3 fw-normal">Inicie Sesión</h1>

          <div class="form-floating">
            <input type="text" class="form-control" id = "usuario" name = "usuario" placeholder="name@example.com">
            <label for="floatingInput">Correo Electronico o Usuario</label>
          </div>
          <div class="form-floating">
            <input type="password" class="form-control" id = "clave" name = "clave" placeholder="Password">
            <label for="floatingPassword">Contraseña</label>
          </div>

          <button class="w-100 btn btn-lg btn-primary" onclick = "ValidarUsuario(USUnomb.value, USUpass.value)">Iniciar</button>
          <p class="mt-5 mb-3 text-body-secondary">&copy; 2023–2023</p>
        <!--</form>-->
      </main>
      <div>
        <?php
          require("modulos/popup_mensajes.php");
        ?>
      </div>
      <script>
      </script>
      <script src="js/fglobales.js"></script>
      <script src="assets/dist/js/bootstrap.bundle.min.js"></script>
      <script src="js/jquery-3.5.1.js"></script>
    </body>
  </html>
<?php 
}
else
{
  if
  ( 
    ($_SESSION['usuario'] != '' || $_SESSION['usuario'] != null) &&
    ($_SESSION['clave'] != '' || $_SESSION['clave'] != null)
  )
  {
    header( 'Location: modulos/validar.php' ) ;
  }
  
  else
  {
    exit();
  }
}

?>