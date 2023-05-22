<?php
session_start();
if(isset($_SESSION['usuario']))
{
  session_destroy();
}
?>
<!doctype html>
<html lang="en" data-bs-theme="auto">
  <head><script src="assets/js/color-modes.js"></script>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="Mark Otto, Jacob Thornton, and Bootstrap contributors">
    <meta name="generator" content="Hugo 0.111.3">
    <title>SICS - Bienvenido</title>

    <link href="assets/dist/css/bootstrap.min.css" rel="stylesheet">

    
  </head>
  <body>
    
    <main class="container py-5">
      <h1>Sistema de calificacion de servicio "SICS"</h1>
      <p class="lead">
          Bienvenido!, aqui podra calificar la calidad de la atencion 
          recibida por nuestro personal, tambien podra consultar las calificaciones 
          que ha realizado y sus datos personales si esta registrado para contactarlo y conocer mas de su experiencia.
      </p>

      <div class="row" data-masonry='{"percentPosition": true }'>
        
        <div class="col-lg-3 md-3 col-sm-3 offset-lg-2 offset-md-2 offset-sm-2">
            <div class="card">
                <a href = "calificar.php" class="link-dark link-underline link-underline-opacity-0">
                  <svg class="bd-placeholder-img card-img-top" width="100%" height="200" xmlns="http://www.w3.org/2000/svg" role="img" aria-label="Placeholder: Image cap" preserveAspectRatio="xMidYMid slice" focusable="false"><title>Placeholder</title><rect width="100%" height="100%" fill="#868e96"/><text x="50%" y="50%" fill="#dee2e6" dy=".3em">Image cap</text></svg>
                  <div class="card-body">
                      <h5 class="card-title">Califique nuestra atención</h5>
                      <p class="card-text">
                          En esta opcion, podra calificar la atención recibida a traves de las distintas
                          opciones de atención. (Por telefono, visitandonos, por correo, por chat y mucho mas!)
                      </p>
                  </div>
                </a>
            </div>
        </div>
        <div class="col-lg-3 md-3 col-sm-3 offset-lg-1 offset-md-1 offset-sm-1">
            <div class="card">
              <a href = "sign-in.php" class="link-dark link-underline link-underline-opacity-0">
                <svg class="bd-placeholder-img card-img-top" width="100%" height="200" xmlns="http://www.w3.org/2000/svg" role="img" aria-label="Placeholder: Image cap" preserveAspectRatio="xMidYMid slice" focusable="false"><title>Placeholder</title><rect width="100%" height="100%" fill="#868e96"/><text x="50%" y="50%" fill="#dee2e6" dy=".3em">Image cap</text></svg>
                <div class="card-body">
                    <h5 class="card-title">Conozca su información registrada y sus calificaciones</h5>
                    <p class="card-text">
                        Aqui podra consultar su informacion registrada, actualizarla, y conocer las 
                        calificaciones que ha realizado.
                    </p>
                </div>
              </a>
            </div>
        </div>

      </div>

      <?php
        require('modulos/footer.php')
      ?>
    </main>

    <script src="assets/dist/js/bootstrap.bundle.min.js"></script>
    <script async src="https://cdn.jsdelivr.net/npm/masonry-layout@4.2.2/dist/masonry.pkgd.min.js" integrity="sha384-GNFwBvfVxBkLMJpYMOABq3c+d3KnQxudP/mGPkzpZSTYykLBNsZEnG2D9G/X/+7D" crossorigin="anonymous"></script>
    
  </body>
</html>
