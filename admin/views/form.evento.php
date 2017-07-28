<?php
  require_once('../_class/class.evento.php');
  $Evento = new Evento();
  // Variables
  $data['nombre'] = '';
  $data['status'] = '';
  $titulo = 'Agregar evento';
  $action = 'save';
  $id = '';
  if(isset($_GET['id'])){
    $id = $_GET['id'];
    $evento = $Evento->get_data($id);
    $data['nombre'] = $evento[0]['nombre'];
    $data['status'] = $evento[0]['status'];
    $titulo = 'Editar evento';
    $action = 'update';
}
 ?>
<div class="modal-content">
  <div class="modal-header">
  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
    <span aria-hidden="true">&times;</span>
  </button>
  <h4 class="modal-title" id="myModalLabel1"><?php echo $titulo; ?></h4>
  </div>
  <div class="modal-body">
    <div class="row">
      <div class="col-12">
        <form name="frmEvento" id="frmEvento" class="row">
          <div class="form-group col-12">
            <label for="nombre">Nombre</label>
            <input type="text" id="nombre" name="nombre" class="form-control" value="<?php echo $data['nombre'];?>">
          </div>
          <div class="form-group col-6">
            <label for="status">Estado</label>
            <select class="form-control" name="status" id="status">
              <option value="0" <?php if($data['status'] == 0) echo 'selected'; ?>>Inactivo</option>
              <option value="1" <?php if($data['status'] == 1) echo 'selected'; ?>>Activo</option>
            </select>
          </div>
          <input type="hidden" name="id" value="<?php echo $id; ?>">
        </form>
      </div>
    </div>
  </div>
  <div class="modal-footer">
  <button type="a" class="btn grey btn-outline-secondary" data-dismiss="modal">Cerrar</button>
  <button type="a" id="save" class="btn btn-outline-primary onSave" data-form="#frmEvento" data-src="evento" data-action="<?php echo $action; ?>">Guardar</button>
  </div>
</div>
