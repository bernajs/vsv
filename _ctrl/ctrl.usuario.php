<?php
session_start();
require_once('../admin/_class/class.usuario.php');
require_once('../_composer/class.notify.php');
$objNotify = new Notify();
$obj = new Usuario();
switch($_POST['exec']) {
    case "login":
        $data = $_POST['data'];
        $user = $obj->isRegistered($data['correo'],$data['contrasena']);
        if($user){
            $result['redirect'] = 'index.php';
            $result['uid'] = $user[0]['id'];
            $result['status'] = 202;
            $_SESSION["onSession"] = true;
            $_SESSION["uid"] = $user[0]['id'];
    }else{
        $result['status'] = 0;
    }
    echo json_encode($result);
    break;
case "fb_login":
    $data = $_POST['data'];
    $user = $obj->ifFbRegistered($data);
    if($user){
        $result['redirect'] = 'home.php';
        $result['status'] = 202;
        $_SESSION["onSession"] = true;
        $_SESSION["uid"] = $user[0]['id'];
}else{
    $result['status'] = 0;
}
echo json_encode($result);
break;
case "recover":
    $correo = $_POST['data'];
    $user = $obj->recover($correo);
    if($user){
        $notify_data = ['contrasena' => $user[0]['contrasena'], "usuario"=> $user[0]['nombre']];
        $objNotify->send("eleve-recover",$notify_data,$user[0]['correo']);
        $result['status'] = 202;
        // $result['redirect'] = "login.php";
}else{
    $result['status'] = 404;
}
echo json_encode($result);
break;
case "register":
    $data = $_POST['data'];
    if(!$obj->isDuplicate($data['correos'])){
    if($data['fb_id']){$password = $data['fb_id'];}else{$password = $data['password'];}
    $obj->set_correo($data['email'])->
    set_nombre($data['name'])->
    set_apellido($data['last_name'])->
    set_contrasena($password)->
    set_fb_id($data['fb_id'])->
    set_telefono($data['telefono'])->
    set_created_at(date("Y-m-d H:i:s"))->
    set_status(1)->
    db('insert');
    // $result['redirect'] = 'home.php';
    // $result['status'] = 202;
    $_SESSION["onSession"] = true;
    $_SESSION["uid"] = $obj->getLastInserted();
    $result['status'] = 202;
}else{
    $result['status'] = 404;
}
echo json_encode($result);
break;
case "asociarme":
    $data = $_POST['data'];
    if(!$obj->isDuplicate($data['correo'])){
    $obj->set_correo($data['correo'])->
    set_nombre($data['nombre'])->
    // set_apellido($data['apellidos'])->
    set_contrasena($data['contrasena'])->
    set_telefono($data['telefono'])->
    set_celular($data['celular'])->
    set_created_at(date("Y-m-d H:i:s"))->
    set_status(1)->
    db('insert');
    // $result['redirect'] = 'home.php';
    // $result['status'] = 202;
    $uid = $obj->getLastInserted();
    $_SESSION["onSession"] = true;
    $_SESSION["uid"] = $uid;
    $result["nombre"] = $data['nombre'];
    $result["uid"] = $uid;
    $result['status'] = 202;
}else{
    $result['status'] = 404;
}
echo json_encode($result);
break;
case "del_favorito":
    $data = $_POST['data'];
    $obj->set_id($data)->db('del_favorito');
    $result["status"] = 202;
echo json_encode($result);
break;
case "favorito":
    $data = $_POST['data'];
    $obj->set_id($data['uid'])->
    set_id_quinta($data['id'])->
    set_created_at(date("Y-m-d H:i:s"))->
    db('favorito');
    $fid = $obj->getLastInserted();
    $result["fid"] = $fid;
    $result["status"] = 202;
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
    set_apellido($data['apellido'])->
    set_contrasena($data['contrasena'])->
    set_telefono($data['telefono'])->
    set_celular($data['celular'])->
    set_modified_at_at(date("Y-m-d H:i:s"))->
    set_status(1)->
    db('update');
    $result['status'] = 202;
}else{
    $result['status'] = 404;
}
echo json_encode($result);
break;
}
?>
