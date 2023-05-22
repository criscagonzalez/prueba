<?php
  require("header-root.php");
?>

<div class="container-fluid">
  <div class="row">
    
    <?php require("modulos/menu-root.php"); ?>

    <main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">
      <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <div class="btn-toolbar mb-2 mb-md-0">
          <div class="btn-group me-2">
            <button type="button" class="btn btn-sm btn-outline-secondary" data-bs-toggle="modal" data-bs-target="#Actor" onclick = "Actores('Registrar')">Crear Nuevo Actor</button>
          </div>
        </div>
      </div>
      <h2>Actores Registrados</h2>
      <div class="table-responsive" id = "tactores">
        <?php 
          require("modulos/tactores.php");
        ?>
      </div>
      
    </main>
  </div>
</div>