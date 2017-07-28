<?php
session_start();
require_once('../_class/class.horario.php');
require_once('../../_composer/class.notify.php');
$objNotify = new Notify();
$obj = new Horario();
switch($_POST['exec']) {
case "save":
    $data = $_POST['data'];
    // if(!$obj->isDuplicate($data['nombre'])){
    echo $precio;
        $obj->set_id_quinta($data['id_quinta'])->
        set_nombre($data['nombre'])->
        set_descripcion($data['descripcion'])->
        set_precio(replace_dinero($data['precio']))->
        set_inicio(date('H:i:s', strtotime($data['inicio'])))->
        set_fin(date('H:i:s', strtotime($data['fin'])))->
        set_created_at(date("Y-m-d H:i:s"))->
        db('insert');
        $result['status'] = 202;
        // echo json_encode($result);
// }else{
    // $result['status'] = 409;
    echo json_encode($result);
// }
break;
case "update":
    $data = $_POST['data'];
    $obj->set_id($data['id'])->
    set_nombre($data['nombre'])->
    set_descripcion($data['descripcion'])->
    set_inicio(date('H:i:s', strtotime($data['inicio'])))->
    set_fin(date('H:i:s', strtotime($data['fin'])))->
    set_precio(replace_dinero($data['precio']))->
    set_modified_at(date("Y-m-d H:i:s"))->
    db('update');
    $result['status'] = 202;
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
?>
