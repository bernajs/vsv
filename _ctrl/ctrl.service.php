<?php
session_start();
require_once('../admin/_class/class.service.php');
require_once('../admin/_class/class.quinta.php');
require_once('../_composer/class.notify.php');
$obj = new Service();
$Quinta = new Quinta();
$data = $_POST['data'];

switch($_POST['exec']) {
  case "buscar":
    $data['fecha'] = str_replace('/','-',$data['fecha']);
    $quintas_result = array();
    $quintas = $Quinta->get_buscar_quintas(date('Y-m-d', strtotime($data['fecha'])), $data['evento'], $data['zona']);
    if($quintas){
      foreach ($quintas as $key => $quinta) {
        if(isset($quinta['status'])) if($quinta['status'] == 0) continue;
        $comentarios = $Quinta->get_comentarios($quinta['id_quinta']);
        array_push($quintas_result, array('quinta'=>$quinta, 'comentarios' => count($comentarios)));
      }
      $result['status']=202;$result['data'] = $quintas_result;
    }
    else{$result['status']=404;}
    echo json_encode($result);
  break;
    case "get_servicios_by_categoria":
        $servicios = $obj->get_servicios_by_categoria($data);
        $servicios_result = array();
        $categoria = $obj->get_categoria($data);
        if($servicios){
          foreach ($servicios as $servicio) {
          $servicio_categorias = $obj->get_servicio_categorias($servicio['id']);
          if($servicio_categorias){
            $servicio_result = array("servicio" => $servicio, "categorias"=>$servicio_categorias);
            array_push($servicios_result, $servicio_result);
          }
        }
            $result['servicios'] = $servicios_result;
            $result['status'] = 202;
            $result['categoria'] = $categoria[0];
    }else{
        $result['status'] = 0;
    }
    echo json_encode($result);
    break;
    case "get_reservaciones":
      $horarios = $obj->get_reservaciones($data['id'], $data['fecha']);
      if($horarios){$result['status']=202;$result['horarios'] = $horarios;}
      else{$result['status']=404;}
      echo json_encode($result);
    break;
    case "reservar":
      $obj->set_id_usuario($data['id_usuario'])->
      set_id_quinta($data['id_quinta'])->
      set_id_horario($data['id_horario'])->
      set_precio($data['precio'])->
      set_status(1)->
      set_created_at(date('Y-m-d H:i:s'))->
      set_fecha($data['fecha'])->db('reservar');

      // Actualizar estado de las reservaciones una fecha de la Quinta
      $estado = $Quinta->get_estado_fecha($data['id_quinta'], $data['fecha']);
      if(!$estado) $Quinta->set_id_quinta($data['id_quinta'])->set_status(1)->set_fecha($data['fecha'])->db('crear_registro_reservacion');
      $horarios = $Quinta->get_horarios($data['id_quinta']);
      $reservaciones = $Quinta->get_reservaciones($data['id_quinta'], $data['fecha']);
      if(count($horarios) > count($reservaciones)) {$Quinta->set_id($data['id_quinta'])->set_status(1)->set_fecha($data['fecha'])->db('actualizar_reservaciones');}
      else{$Quinta->set_id($data['id_quinta'])->set_status(0)->set_fecha($data['fecha'])->db('actualizar_reservaciones');}
      $result['status']=202;
      echo json_encode($result);
    break;
}
?>
