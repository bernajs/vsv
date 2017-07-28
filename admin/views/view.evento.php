<?php
    require_once('_class/class.evento.php');
    $Evento = new Evento();
    $eventos = $Evento->get_data();
    $tbody='';
    if($eventos){
      foreach ($eventos as $evento) {
        $id = $evento['id'];
        $tbody .= '<tr class="'.$id.'">';
        $tbody .= '<td>'.$evento['nombre'].'</td>';
        $tbody .= '<td>'.$evento['status'].'</td>';
        $tbody .= '<td class="acciones">
        <a href="javascript:void(0)" class="onDelete" data-id="'.$id.'" data-src="evento"><i class="ft-trash-2"></i></a>
        <a class="onEdit onModal" href="views/form.evento.php?id='.$id.'"><i class="ft-edit"></i></a></td>';
      }
    }
?>

<div class="card">
  <div class="card-header">
    <h4 class="card-title">Evento</h4>
    <a class="heading-elements-toggle"><i class="fa fa-ellipsis-v font-medium-3"></i></a>
    <a href="views/form.evento.php" class="btn btn-outline-primary block btn-lg onModal btn-add">Agregar evento</a>
  </div>
  <div class="card-body collapse in">
    <div class="card-block">
      <div class="row">
        <div class="col-12">
          <table class="table table-striped table-bordered zero-configuration">
            <thead>
              <tr>
                <th>Nombre</th>
                <th>Status</th>
                <th>Acciones</th>
              </thead>
              <tbody>
                <?php echo $tbody; ?>
              </tbody>
              <tfoot>
                <tr>
                  <th>Nombre</th>
                  <th>Status</th>
                  <th>Acciones</th>
                </tr>
              </tfoot>
            </table>
        </div>
      </div>
    </div>
  </div>
</div>

<style media="screen">
  .img-promo{width:50px; height: 50px;}
</style>
