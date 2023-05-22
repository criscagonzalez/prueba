<!-- Modal -->
<div class="modal fade" id="Pelicula" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered modal-lg">
    <div class="modal-content">
      <div class="modal-header">
        <h1 class="modal-title fs-5" id="Pelicula-Titulo">Registrar Nueva Pelicula </h1>
        <h1 class="modal-title fs-5" id="Pelicula-Id"></h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <div class="container">
            <div class="row">
                <div class="col-lg-3 col-mb-3 col-sm-3">
                    <label for="npelicula" class="form-label">(*) Pelicula </label>
                </div>
                <div class="col-lg-9 col-mb-9 col-sm-9">
                    <input type="text" class="form-control" id="npelicula" aria-describedby="pelicula">
                </div>
            </div>
            <br>
            <div class="row align-items-center" id = "resultados">
              <?php
                //require("tresultados.php");
              ?>
            </div>
        </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Cancelar</button>
        <button type="button" id = "Pelicula-btn-guardar" class="btn btn-success" onclick = "Peliculas('Crear', PopupnPELInomb.value)" data-bs-dismiss="modal">Guardar</button>
      </div>
    </div>
  </div>
</div>