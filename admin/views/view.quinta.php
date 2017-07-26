<?php
    require_once('_class/class.quinta.php');
    $Quinta = new Quinta();
    $quintas = $Quinta->get_data();
    $tbody='';
    if($quintas){
      foreach ($quintas as $quinta) {
        $id = $quinta['id'];
        $tbody .= '<tr class="'.$id.'">';
        $tbody .= '<td>'.$quinta['nombre'].'</td>';
        $tbody .= '<td>'.$quinta['usuario'].'</td>';
        $tbody .= '<td>'.$quinta['ciudad'].'</td><td style="text-align:center;"><a href="javascript:void(0);" class="onDestacado '.$id.'" data-src="quinta" data-id="'.$id.'" data-destacado="'.$quinta['destacado'].'">';
        $quinta['destacado'] == 1 ? $tbody .= '<i class="fa fa-star destacado '.$quinta['id'].'"></i>' : $tbody .= '<i class="fa fa-star ndestacado '.$quinta['id'].'">';
        $tbody .= '</a></td><td class="acciones">
        <a href="javascript:void(0)" class="onDelete" data-id="'.$id.'" data-src="quinta"><i class="material-icons">delete</i></a>
        <a class="onEdit" href="index.php?call=quinta_detalle&id='.$id.'"><i class="material-icons">edit</i></a></td>';
      }
    }
?>

<div class="card">
  <div class="card-header">
    <h4 class="card-title">Quintas</h4>
    <a class="heading-elements-toggle"><i class="fa fa-ellipsis-v font-medium-3"></i></a>
    <a href="index.php?call=quinta_detalle" class="btn btn-outline-primary block btn-lg">Agregar Quinta</a>
  </div>
  <div class="card-body collapse in">
    <div class="card-block">
      <div class="row">
        <div class="col-12">
          <table class="table table-striped table-bordered zero-configuration">
            <thead>
              <tr>
                <th>Quinta</th>
                <th>Dueño</th>
                <th>Ciudad</th>
                <th>Destacado</th>
                <th>Acciones</th>
              </thead>
              <tbody>
                <?php echo $tbody; ?>
              </tbody>
              <tfoot>
                <tr>
                  <th>Quinta</th>
                  <th>Dueño</th>
                  <th>Ciudad</th>
                  <th>Destacado</th>
                  <th>Acciones</th>
                </tr>
              </tfoot>
            </table>
        </div>
      </div>
    </div>
  </div>
</div>
