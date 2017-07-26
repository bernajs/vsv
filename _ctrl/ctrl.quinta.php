<?php
session_start();
require_once('../admin/_class/class.quinta.php');
$obj = new Quinta();
switch($_POST['exec']) {
case "save":
    $data = $_POST['data'];
    if(!$obj->isDuplicate($data['nombre'])){
      $direccion = direccion_to_json($data);
      $coordenadas = coords_to_json($data);
      $fotos = fotos_to_array($data['fotos[']);
      $obj->set_id_usuario($data['id_usuario'])->
        set_nombre($data['nombre'])->
        set_direccion(json_encode($direccion))->
        set_estado($data['estado'])->
        set_zona($data['zona'])->
        set_videos($data['videos'])->
        set_fotos($fotos)->
        set_municipio($data['municipio'])->
        set_ciudad($data['ciudad'])->
        set_coordenadas(json_encode($coordenadas))->
        set_descripcion($data['descripcion'])->
        set_tipo_evento($data['tipo_evento'])->
        set_capacidad($data['capacidad'])->
        set_destacado($data['destacado'])->
        set_calificacion(5)->
        set_status($data['status'])->
        set_created_at(date("Y-m-d H:i:s"))->
        set_id($data['id'])->
        db('insert');
        $result['status'] = 202;
        $id = $obj->getLastInserted();
        if(isset($data['caracteristica['])) $caracteristicas = $data['caracteristica[']; else $caracteristicas = '';
        insert_caracteristicas($id, $caracteristicas, $obj);
        $result['redirect'] = 'index.php?call=quinta_detalle&id='.$id;
        echo json_encode($result);
}else{
    $result['status'] = 404;
    echo json_encode($result);
}
break;
case "edicion":
$data = $_POST['data'];
$obj->set_id_quinta($data['id_quinta'])->
set_cambio($data['cambio'])->
set_created_at(date('Y-m-d H:i:s'))->db('edicion');
$result['status'] = 202;
echo json_encode($result);
break;
case "delete":
    $data = $_POST['data'];
    $obj->set_id($data['id'])->db('delete');
    $result['status'] = 202;
    echo json_encode($result);
    break;
case "get_dueno":
    $data = $_POST['data'];
    $dueno = $obj->get_dueno($data['id']);
    $nombre = $dueno[0]['nombre'] . ' '. $dueno[0]['apellido'];
    if ($dueno) {$result['status'] = 202; $result['dueno'] = $nombre; $result['id'] = $dueno[0]['id'];} else {$result['status'] = 404;}
    echo json_encode($result);
    break;
}
function direccion_to_json($data){
  return array('calle'=>$data['calle'],
  'numero'=>$data['numero'],
  'colonia'=>$data['colonia'],
  'cp'=>$data['cp'],);
}
function coords_to_json($data){return array('lat'=>floatval($data['lat']), "lng"=>floatval($data['lng']));}
function fotos_to_array($fotos){
  $fotos = str_replace('|', '', $fotos);
  $fotos = explode(',', $fotos);
  return json_encode($fotos);
}
function insert_caracteristicas($id, $caracteristicas, $obj){
  $caracteristicas = explode('|', $caracteristicas);

  if($id){$obj->set_id($id)->db('delete_caracteristica');}
  foreach ($caracteristicas as $caracteristica) {
    if($caracteristica) $obj->set_id($id)->set_id_caracteristica($caracteristica)->set_created_at(date("Y-m-d H:i:s"))->db('insert_caracteristica');
  }
}
?>
