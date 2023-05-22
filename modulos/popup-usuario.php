<!-- Modal -->
<div class="modal fade" id="Usuario" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h1 class="modal-title fs-5" id="Usuario-Titulo">Registrar Nuevo Usuario</h1>
        <h1 class="modal-title fs-5" id="Usuario-Id"></h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <div class="container">
            <div class="row">
                <div class="col-lg-6 col-mb-6 col-sm-6">
                    <label for="exampleInputEmail1" class="form-label">(*) Nombre De Usuario</label>
                </div>
                <div class="col-lg-6 col-mb-6 col-sm-6">
                    <input type="email" class="form-control" id="nusuario" aria-describedby="usuario">
                </div>
            </div>
            <div class="row">
                <div class="col-lg-6 col-mb-6 col-sm-6">
                    <label for="exampleInputEmail1" class="form-label" id = "Usuario-Clave">(*) Contraseña</label>
                </div>
                <div class="col-lg-6 col-mb-6 col-sm-6">
                    <input type="password" class="form-control" id="npassword" aria-describedby="contraseña">
                </div>
            </div>
            <div class="row">
                <div class="col-lg-6 col-mb-6 col-sm-6">
                    <label for="exampleInputEmail1" class="form-label">(*) Tipo</label>
                </div>
                <div class="col-lg-6 col-mb-6 col-sm-6">
                    <select class="form-select" aria-label="Default select example" id="ntipo">
                        <option value="user">Usuario</option>    
                        <option value="admin">Administrador</option>
                    </select>
                </div>
            </div>
        </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Cancelar</button>
        <button type="button" id = "Usuario-btn-guardar" class="btn btn-success" onclick = "Usuarios('Crear', PopupnUSUnomb.value, PopupnUSUpass.value, PopupnUSUtusu.value)" data-bs-dismiss="modal">Guardar</button>
      </div>
    </div>
  </div>
</div>