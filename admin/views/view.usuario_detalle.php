<?php
require_once('_class/class.usuario.php');
$Usuario = new Usuario();
// Variables
$data['nombre'] = '';
$data['apellido'] = '';
$data['correo'] = '';
$data['contrasena'] = '';
$data['tipo'] = '';
$data['celular'] = '';
$data['telefono'] = '';
$data['observaciones'] = '';
$data['status'] = '';
$data['id'] = '';
$action = 'save';
$id = '';
$lista_fotos= '';
$title = 'Agregar usuario';

if(isset($_GET['id'])){
  $id = $_GET['id'];
  $usuario = $Usuario->get_data($id);
  $data['nombre'] = $usuario[0]['nombre'];
  $data['apellido'] = $usuario[0]['apellido'];
  $data['correo'] = $usuario[0]['correo'];
  $data['contrasena'] = $usuario[0]['contrasena'];
  $data['telefono'] = $usuario[0]['telefono'];
  $data['celular'] = $usuario[0]['celular'];
  $data['tipo'] = $usuario[0]['tipo'];
  $data['observaciones'] = $usuario[0]['observaciones'];
  $data['status'] = $usuario[0]['status'];
  $data['created_at'] = $usuario[0]['created_at'];
  $action = 'update';
  $title = 'Editando usuario';


  // caracteristicas
  $quintas = $Usuario->get_quintas($id);
  $lista_quintas = '';
  if($quintas){foreach ($quintas as $key => $quinta) {
    $lista_quintas .= '<a href="index.php?call=quinta_detalle&id='.$quinta['id'].'" class="list-group-item list-group-item-action" target="_blank">'.$quinta['nombre'].'</a>';
  }
  }
}
 ?>

<div class="card">
  <div class="card-header pb-0">
    <h4 class="card-title"><?php echo $title; ?></h4>
    <?php if($id && $data['status'] == 0): ?>
      <div class="row">
      <button type="button" data-id="<?php echo $id; ?>" data-action="aprobar" class="btn btn-outline-primary mt-1 onUsuario">Aprobar Usuario</button>
      <button type="button" data-id="<?php echo $id; ?>" data-action="rechazar" class="btn btn-outline-primary mt-1 onUsuario">Rechazar Usuario</button>
    </div>
    <?php endif; ?>
  </div>
  <div class="card-body collapse in">
    <div class="card-block">
      <div class="tab-content px-1 pt-1">
        <div role="tabpanel" class="tab-pane active" id="datos-content" aria-expanded="true" aria-labelledby="datos">
          <div class="row">
            <div class="col-12">
                <div class="row">
                  <form id="frmUsuario" name="frmUsuario">
                  <div class="form-group col-6">
                    <label for="nombre">Nombre</label>
                    <input type="text" id="nombre" name="nombre" class="form-control isRequired" value="<?php echo $data['nombre']; ?>">
                  </div>
                  <div class="form-group col-6">
                    <label for="apellido">Apellido</label>
                    <input type="text" id="apellido" name="apellido" class="form-control isRequired" value="<?php echo $data['apellido']; ?>">
                  </div>
                  <div class="form-group col-3">
                    <label for="correo">Correo</label>
                    <input type="email" id="correo" name="correo" class="form-control isRequired" value="<?php echo $data['correo']; ?>">
                  </div>
                  <div class="form-group col-3">
                    <label for="contrasena">Contrasena</label>
                    <input type="text" id="contrasena" name="contrasena" class="form-control isRequired" value="<?php echo $data['contrasena']; ?>">
                  </div>
                  <div class="form-group col-3">
                    <label for="celular">Celular</label>
                    <input type="text" id="celular" name="celular" class="form-control isRequired isNumber" value="<?php echo $data['celular']; ?>">
                  </div>
                  <div class="form-group col-3">
                    <label for="telefono">Telefono</label>
                    <input type="text" id="telefono" name="telefono" class="form-control isRequired isNumber" value="<?php echo $data['telefono']; ?>">
                  </div>
                  <div class="form-group col-3">
                    <label for="tipo">Tipo de usuario</label>
                    <select class="form-control isRequired" name="tipo" id="tipo">
                      <option value="u" <?php if($data['tipo'] == 'u') echo 'selected'; ?>>Usuario normal</option>
                      <option value="s" <?php if($data['tipo'] == 's') echo 'selected'; ?>>Socio</option>
                    </select>
                  </div>
                  <div class="form-group col-3">
                    <label for="status">Estado (Activo/inactivo)</label>
                    <select class="form-control isRequired" name="status" id="status">
                      <option value="0" <?php if($data['status'] == 0) echo 'selected'; ?>>Inactivo</option>
                      <option value="1" <?php if($data['status'] == 1) echo 'selected'; ?>>Activo</option>
                    </select>
                  </div>
                  <div class="col-12">
                    <div class="row">
                      <div class="col-6">
                        <h6>Lista de Quintas</h6>
                          <ul class="list-group"><?php echo $lista_quintas; ?></ul>
                      </div>
                      <div class="form-group col-6">
                        <label for="observaciones">Observaciones</label>
                        <textarea name="observaciones" id="observaciones" rows="8" cols="50" class="form-control isRequired"><?php echo $data['observaciones'];?></textarea>
                      </div>
                    </div>
                  </div>
                  <input type="hidden" name="id" id="id" value="<?php echo $id; ?>">
                </div>
              </form>
            </div>
              <div class="col-6 offset-md-3">
                <button style="width:100%;" type="button" id="onSave" class="btn btn-outline-primary onSave mt-20" data-form="#frmUsuario" data-src="usuario" data-action="<?php echo $action; ?>">Guardar</button>
              </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>

<style media="screen">

</style>
