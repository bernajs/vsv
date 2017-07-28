<?php
    require_once('_class/class.usuario.php');
    $Usuario = new Usuario();
    $usuarios = $Usuario->get_data();
    $tbody='';
    if($usuarios){
      foreach ($usuarios as $usuario) {
        $id = $usuario['id'];
        $tbody .= '<tr class="'.$id.'">';
        $tbody .= '<td>'.$id.'</td>';
        $tbody .= '<td>'.$usuario['nombre'].' '.$usuario['apellido'].'</td>';
        $tbody .= '<td>'.$usuario['correo'].'</td>';
        $tbody .= '<td>'.$usuario['celular'].'</td>';
        $tbody .= '<td>'.$usuario['telefono'].'</td>';
        $tbody .= '<td>'.$usuario['tipo'].'</td>';
        $tbody .= '<td class="acciones">
        <a href="javascript:void(0)" class="onDelete" data-id="'.$id.'" data-src="usuario"><i class="ft-trash-2"></i></a>
        <a class="onEdit" href="index.php?call=usuario_detalle&id='.$id.'"><i class="ft-edit"></i></a></td>';
      }
    }
?>

<div class="card">
  <div class="card-header">
    <h4 class="card-title">Usuarios</h4>
    <a class="heading-elements-toggle"><i class="fa fa-ellipsis-v font-medium-3"></i></a>
    <a href="index.php?call=usuario_detalle" class="btn btn-outline-primary block btn-lg btn-add">Agregar Usuario</a>
  </div>
  <div class="card-body collapse in">
    <div class="card-block">
      <div class="row">
        <div class="col-12">
          <table class="table table-striped table-bordered zero-configuration">
            <thead>
              <tr>
                <th>ID</th>
                <th>Usuario</th>
                <th>Correo</th>
                <th>Telefono</th>
                <th>Celular</th>
                <th>Tipo</th>
                <th>Acciones</th>
              </thead>
              <tbody>
                <?php echo $tbody; ?>
              </tbody>
              <tfoot>
                <th>ID</th>
                <th>Usuario</th>
                <th>Correo</th>
                <th>Telefono</th>
                <th>Celular</th>
                <th>Tipo</th>
                <th>Acciones</th>
                </tr>
              </tfoot>
            </table>
        </div>
      </div>
    </div>
  </div>
</div>
