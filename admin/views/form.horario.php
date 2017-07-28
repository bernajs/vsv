<?php
  require_once('../_class/class.horario.php');
  $Horario = new Horario();
  // Variables
  $data['nombre'] = '';
  $data['precio'] = '';
  $data['inicio'] = '';
  $data['fin'] = '';
  $data['descripcion'] = '';
  $data['status'] = '';
  $titulo = 'Agregar horario';
  $action = 'save';
  $id = '';
  if(isset($_GET['quinta'])) $id_quinta = $_GET['quinta'];
  if(isset($_GET['id'])){
    $id = $_GET['id'];
    $horario = $Horario->get_data($id);
    $data['nombre'] = $horario[0]['nombre'];
    $data['precio'] = $horario[0]['precio'];
    $data['inicio'] = $horario[0]['inicio'];
    $data['fin'] = $horario[0]['fin'];
    $data['descripcion'] = $horario[0]['descripcion'];
    $data['status'] = $horario[0]['status'];
    $titulo = 'Editar horario';
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
        <form class="" id="frmHorario">
          <div class="row">
            <div class="col-12">
              <div class="form-group">
                <label for="nombre">Nombre del horario:</label>
                <input type="text" name="nombre" class="form-control isRequired" value="<?php echo $data['nombre']; ?>">
              </div>
            </div>
            <div class="col-4">
              <div class="form-group">
                <label for="precio">Precio:</label>
                <input type="text" name="precio" id="precio" class="form-control isRequired isPrecio" value="<?php echo $data['precio']; ?>">
              </div>
            </div>
            <div class="col-4">
              <div class="form-group">
                <label for="inicio">Hora inicio:</label>
                <input type="time" name="inicio" id="inicio" class="form-control isRequired isHoraInicio" value="<?php echo $data['inicio']; ?>">
              </div>
            </div>
            <div class="col-4">
              <div class="form-group">
                <label for="fin">Hora fin:</label>
                <input type="time" name="fin" id="fin" class="form-control isRequired isHoraFin" value="<?php echo $data['fin']; ?>">
              </div>
            </div>
            <div class="form-group">
              <div class="col-12">
                <label for="descripcion">Descripción</label>
                <textarea name="descripcion" class="form-control"><?php echo $data['descripcion']; ?></textarea>
              </div>
            </div>
          </div>
          <input type="hidden" name="id_quinta" value="<?php echo $id_quinta; ?>">
          <input type="hidden" name="id" value="<?php echo $id; ?>">
        </form>
      </div>
    </div>
  </div>
  <div class="modal-footer">
  <button type="button" class="btn grey btn-outline-secondary" data-dismiss="modal">Cerrar</button>
  <button type="button" id="save" class="btn btn-outline-primary onSave" data-form="#frmHorario" data-src="horario" data-action="<?php echo $action; ?>">Guardar</button>
  </div>
</div>

<script type="text/javascript">
$(document).ready(function(){
  new Cleave('.isHoraInicio', {
      delimiters: [':', ':'],
      blocks: [2, 2],
      uppercase: true
  });
  new Cleave('.isHoraFin', {
      delimiters: [':', ':'],
      blocks: [2, 2],
      uppercase: true
  });

  new Cleave('.isPrecio', {
      numeral: true,
      prefix: '$'
  });
})
</script>
