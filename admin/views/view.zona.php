<?php
    require_once('_class/class.zona.php');
    $Zona = new Zona();
    $zonas = $Zona->get_data();
    $tbody='';
    if($zonas){
      foreach ($zonas as $zona) {
        $id = $zona['id'];
        $tbody .= '<tr class="'.$id.'">';
        $tbody .= '<td>'.$zona['nombre'].'</td>';
        $tbody .= '<td>'.$status[$zona['status']].'</td>';
        $tbody .= '<td class="acciones">
        <a href="javascript:void(0)" class="onDelete" data-id="'.$id.'" data-src="zona"><i class="ft-trash-2"></i></a>
        <a class="onEdit onModal" href="views/form.zona.php?id='.$id.'"><i class="ft-edit"></i></a></td>';
      }
    }
?>

<div class="card">
  <div class="card-header">
    <h4 class="card-title">Zona</h4>
    <a class="heading-elements-toggle"><i class="fa fa-ellipsis-v font-medium-3"></i></a>
    <a href="views/form.zona.php" class="btn btn-outline-primary block btn-lg onModal btn-add">Agregar zona</a>
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
