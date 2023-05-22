<div class="container-fluid">
  <div class="row">
    
    <?php require("modulos/menu-root.php"); ?>

    <main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">
      <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <div class="btn-toolbar mb-2 mb-md-0">
          <div class="btn-group me-2">
            <button type="button" class="btn btn-sm btn-outline-secondary" data-bs-toggle="modal" data-bs-target="#Usuario" onclick = "Usuarios('Registrar')">Crear Nuevo Usuario</button>
          </div>
        </div>
      </div>
      <h2>Usuarios Registrados</h2>
      <div class="table-responsive" id = "tusuarios">
        <?php 
          require("modulos/tusuarios.php");
        ?>
      </div>      
    </main>
  </div>
</div>

<?php
  require("modulos/footer.php");
?>