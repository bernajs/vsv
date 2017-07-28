<?php
session_start();
require_once('../_class/class.horario.php');
require_once('../_class/class.quinta.php');
require_once('../../_composer/class.notify.php');
$objNotify = new Notify();
$obj = new Horario();
$Quinta = new Quinta();
switch($_POST['exec']) {
case "save":
    $data = $_POST['data'];
    $precio = replace_dinero($data['precio']);
    $obj->set_id_quinta($data['id_quinta'])->
    set_nombre($data['nombre'])->
    set_descripcion($data['descripcion'])->
    set_precio($precio)->
    set_inicio(date('H:i:s', strtotime($data['inicio'])))->
    set_fin(date('H:i:s', strtotime($data['fin'])))->
    set_created_at(date("Y-m-d H:i:s"))->
    db('insert');
    check_precios($precio, $data['id_quinta'], $Quinta);
    $result['status'] = 202;
    echo json_encode($result);
break;
case "update":
    $data = $_POST['data'];
    $precio = replace_dinero($data['precio']);
    $obj->set_id($data['id'])->
    set_nombre($data['nombre'])->
    set_descripcion($data['descripcion'])->
    set_inicio(date('H:i:s', strtotime($data['inicio'])))->
    set_fin(date('H:i:s', strtotime($data['fin'])))->
    set_precio($precio)->
    set_modified_at(date("Y-m-d H:i:s"))->
    db('update');
    $result['status'] = 202;
    check_precios($precio, $data['id_quinta'], $Quinta);
    echo json_encode($result);
    break;
case "delete":
    $data = $_POST['data'];
    $obj->set_id($data['id'])->db('delete');
    $result['status'] = 202;
    echo json_encode($result);
    break;
}

function replace_dinero($subject){return str_replace([',', '$'],'', $subject);}
function check_precios($nuevo_precio,$quinta, $Quinta){
  $precios = $Quinta->get_precios($quinta);
  if($precios){
    $precioChange = false;
    $precios = $precios[0];
    if($precios['menor_precio'] > $nuevo_precio){$precios['menor_precio'] = $nuevo_precio;$precioChange = true;}
    if($precios['mayor_precio'] < $nuevo_precio){$precios['mayor_precio'] = $nuevo_precio;$precioChange = true;}
    if($precioChange) $Quinta->set_id($quinta)->set_menor_precio($precios['menor_precio'])->set_mayor_precio($precios['mayor_precio'])->db('actualizar_precio');
  }else{$Quinta->set_id($quinta)->set_menor_precio($nuevo_precio)->set_mayor_precio($nuevo_precio)->db('actualizar_precio');}
  // Si el precio es 0 que actualice

}
?>
