<?php
include_once('_class/class.horario.php');
$Horario = new Horario();
// Horarios
if($id){
$horarios = $Horario->get_horarios_quinta($id);
if($horarios){foreach ($horarios as $key => $horario) {
  // $lista_horarios .= '<div class="col-4"><a class="list-group-item list-group-item-action onModal" href="views/form.horario.php?&quinta='.$id.'&id='.$horario['id'].'">'.$horario['nombre'].'</a></div>';
  $lista_horarios.='<tr><th scope="row">'.$horario['id'].'</th>
    <td>'.$horario['nombre'].'</td>
    <td>'.$horario['inicio'].'</td>
    <td>'.$horario['fin'].'</td>
    <td><a href="javascript:void(0)" class="onDelete" data-id="'.$horario['id'].'" data-src="horario"><i class="ft-trash-2"></i></a>
    <a class="onEdit onModal" href="views/form.horario.php?id='.$horario['id'].'&quinta='.$id.'"><i class="ft-edit"></i></a></td></tr>';
}
}
}
 ?>
<div class="">
  <a href="views/form.horario.php?quinta=<?php echo $id;?>" class="btn btn-outline-primary onModal mb-2 float-xs-right">Agregar horario</a>
  <h4>Horarios</h4>
<table class="table">
  <thead>
    <tr>
      <th>ID</th>
      <th>Nombre</th>
      <th>Inicio</th>
      <th>Fin</th>
      <th>Accion</th>
    </tr>
  </thead>
<tbody>
  <?php echo $lista_horarios; ?>
</tbody>
</table>
</div>
