<!-- Modal -->
<div class="modal fade" id="Actor" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered modal-lg">
    <div class="modal-content">
      <div class="modal-header">
        <h1 class="modal-title fs-5" id="Actor-Titulo">Registrar Nuevo Actor</h1>
        <h1 class="modal-title fs-5" id="Actor-Id"></h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <div class="container">
            <div class="row">
                <div class="col-lg-2 col-mb-2 col-sm-2">
                    <label for="nactor" class="form-label">(*) Actor</label>
                </div>
                <div class="col-lg-9 col-mb-9 col-sm-9">
                    <input type="text" class="form-control" id="nactor" aria-describedby="actor">
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
        <button type="button" id = "Actor-btn-guardar" class="btn btn-success" onclick = "Actores('Crear', PopupnACTnomb.value)" data-bs-dismiss="modal">Guardar</button>
      </div>
    </div>
  </div>
</div>