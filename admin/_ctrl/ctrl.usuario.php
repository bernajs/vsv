<?php
session_start();
require_once('../_class/class.usuario.php');
require_once('../../_composer/class.notify.php');
$objNotify = new Notify();
$obj = new Usuario();
switch($_POST['exec']) {
case "save":
    $data = $_POST['data'];
    if(!$obj->isDuplicate($data['correo'])){
    $obj->set_correo($data['correo'])->
    set_nombre($data['nombre'])->
    set_apellido($data['apellidos'])->
    set_contrasena($data['contrasena'])->
    set_telefono($data['telefono'])->
    set_celular($data['celular'])->
    set_created_at(date("Y-m-d H:i:s"))->
    set_status($data['status'])->
    db('insert');
    $result['status'] = 202;
}else{
    $result['status'] = 404;
}
echo json_encode($result);
break;
case "update":
    $data = $_POST['data'];
    $isCorreo = false;
    $isTelefono = false;
    $isCelular = false;
    if($obj->isEmail($data['id'], $data['correo'])) {$isCorreo = true;$result['correo']=true;}
    if($obj->isTelefono($data['telefono'], $data['id'])) {$isTelefono = true;$result['telefono']=true;}
    if($obj->isCelular($data['celular'], $data['id'])) {$isCelular = true;$result['celular']=true;}
    if(!$isCorreo && !$isCelular && !$isTelefono){
    $obj->set_correo($data['correo'])->
    set_id($data['id'])->
    set_nombre($data['nombre'])->
    set_tipo($data['tipo'])->
    set_observaciones($data['observaciones'])->
    set_apellido($data['apellido'])->
    set_contrasena($data['contrasena'])->
    set_telefono($data['telefono'])->
    set_celular($data['celular'])->
    set_modified_at_at(date("Y-m-d H:i:s"))->
    set_status($data['status'])->
    db('update');
    $result['status'] = 202;
}else{
    $result['status'] = 404;
}
echo json_encode($result);
break;
case "delete":
    $data = $_POST['data'];
    $obj->set_id($data['id'])->db('delete');
    $result['status'] = 202;
    echo json_encode($result);
break;
}
?>
