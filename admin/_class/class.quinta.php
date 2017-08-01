<?php

require_once("class.helper.php");

class Quinta extends Helper {
    var $nombre;
    var $direccion;
    var $estado;
    var $zona;
    var $municipio;
    var $ciudad;
    var $coordenadas;
    var $fotos;
    var $videos;
    var $descripcion;
    var $tipo_evento;
    var $capacidad;
    var $caracteristicas;
    var $calificacion;
    var $destacado;
    var $created_at;
    var $modified_at;
    var $status;
    var $id;
    var $id_usuario;
    var $id_caracteristica;
    var $id_quinta;
    var $cambio;
    var $id_modulo;
    var $menor_precio;
    var $mayor_precio;
    var $fecha;

    public function __construct(){ $this->sql = new db(); }

    public function db($key){
        switch($key){
            case "insert":
                $query = "INSERT INTO quinta (id_usuario,nombre,fotos,videos,direccion,estado,zona,municipio,ciudad,coordenadas,descripcion,tipo_evento,calificacion,capacidad,destacado,status,created_at)
                VALUES (
                '".$this->id_usuario."',
                '".$this->nombre."',
                '".$this->fotos."',
                '".$this->videos."',
                '".$this->direccion."',
                '".$this->estado."',
                '".$this->zona."',
                '".$this->municipio."',
                '".$this->ciudad."',
                '".$this->coordenadas."',
                '".$this->descripcion."',
                '".$this->tipo_evento."',
                '".$this->calificacion."',
                '".$this->capacidad."',
                '".$this->destacado."',
                '".$this->status."',
                '".$this->created_at."'
                )";
                break;
            case "update":
                $query = "UPDATE quinta
                SET
                nombre='".$this->nombre."',
                direccion='".$this->direccion."',
                estado='".$this->estado."',
                zona='".$this->zona."',
                municipio='".$this->municipio."',
                ciudad='".$this->ciudad."',
                coordenadas='".$this->coordenadas."',
                descripcion='".$this->descripcion."',
                fotos='".$this->fotos."',
                videos='".$this->videos."',
                tipo_evento='".$this->tipo_evento."',
                capacidad='".$this->capacidad."',
                destacado='".$this->destacado."',
                status='".$this->status."',
                modified_at='".$this->modified_at."'
                WHERE id=".$this->id;
                break;
                case "insert_caracteristica":
                    $query = "INSERT INTO quinta_caracteristica(id_quinta, id_caracteristica, created_at)
                    VALUES(
                      '".$this->id."',
                      '".$this->id_modulo."',
                      '".$this->created_at."'
                    )";
                break;
                case "insert_evento":
                    $query = "INSERT INTO quinta_evento(id_quinta, id_evento, created_at)
                    VALUES(
                      '".$this->id."',
                      '".$this->id_modulo."',
                      '".$this->created_at."'
                    )";
                break;
            case "edicion":
                    $query = "INSERT INTO cambios (id_quinta,cambio,status,created_at)
                    VALUES (
                    '".$this->id_quinta."',
                    '".$this->cambio."',
                    '".$this->status."',
                    '".$this->created_at."'
                    )";
                break;
            case "crear_registro_reservacion":
                        $query = "INSERT INTO quinta_reservacion (id_quinta,status,fecha)
                        VALUES (
                        '".$this->id_quinta."',
                        '".$this->status."',
                        '".$this->fecha."'
                        )";
            break;
            case "aprobar":$query = "UPDATE quinta SET status=1 WHERE id=".$this->id;break;
            case "rechazar":$query = "UPDATE quinta SET status=2 WHERE id=".$this->id;break;
            case "actualizar_precio":$query = "UPDATE quinta SET menor_precio=".$this->menor_precio.", mayor_precio=".$this->mayor_precio." WHERE id=".$this->id;break;
            case "aprobar_cambio":$query = "UPDATE cambios SET status=1 WHERE id=".$this->id;break;
            case "actualizar_reservaciones":$query = "UPDATE quinta_reservacion SET status=".$this->status." WHERE fecha='".$this->fecha."' AND id_quinta = ".$this->id;break;
            case "rechazar_cambio":$query = "UPDATE cambios SET status=2 WHERE id=".$this->id;break;
            case "destacado":
                $query = "UPDATE quinta SET destacado='".$this->destacado."', modified_at='".$this->modified_at."' WHERE id=".$this->id;
                break;
            case "delete_caracteristica": $query = "DELETE FROM quinta_caracteristica WHERE id_quinta=".$this->id;
                break;
            case "delete_evento": $query = "DELETE FROM quinta_evento WHERE id_quinta=".$this->id;
            break;
            case "destacado":
                $query = "UPDATE quinta SET destacado='".$this->destacado."', modified_at='".$this->modified_at."' WHERE id=".$this->id;
                break;
            case "delete": $query = "DELETE FROM quinta WHERE id=".$this->id;
                break;
    }
    $lid = false;
    if($key=="insert"){ $lid = true; }
    $this->execute($query,$lid);
}

public function get_data($id = null){
    $query = 'SELECT usuario.nombre AS usuario, quinta.nombre, quinta.direccion, quinta.destacado, quinta.ciudad, quinta.id,
    quinta.estado, quinta.municipio, quinta.zona, quinta.coordenadas, quinta.capacidad, quinta.tipo_evento, quinta.status, quinta.descripcion,
    quinta.fotos, quinta.videos, quinta.id_usuario
    FROM quinta INNER JOIN usuario ON quinta.id_usuario = usuario.id WHERE quinta.id > 0';
    if($id!=NULL) $query.=" AND quinta.id=".$id."";
    if($this->status!=NULL) $query .= " AND status=".$this->status;
    if($this->search!=NULL) $query .= " AND ".$this->search_field." LIKE '%".$this->search."%'";
    if($this->order!=NULL) $query .= " ORDER BY ".$this->order;
    if($this->limit!=NULL) $query .= " LIMIT ".$this->limit;
    return $this->execute($query);
}

public function get_precio($id, $tipo){
  $query = 'SELECT precio FROM horario WHERE id_quinta = '.$id;
  $tipo == 'mayor' ? $query .= ' ORDER BY precio ASC LIMIT 1' : $query .= ' ORDER BY precio DESC LIMIT 1';
  return $this->execute($query);
}

public function quintas_pendientes(){
    $query = 'SELECT * FROM quinta WHERE status = 0';
    return $this->execute($query);
}

public function cambios_pendientes($id=null, $quinta=null){
    $query = 'SELECT * FROM cambios WHERE status = 0';
    $id ? $query .= ' AND id = '.$id.' AND id_quinta = '.$quinta:true;
    return $this->execute($query);
}

public function get_dueno($correo){
  $query = 'SELECT * FROM usuario WHERE status = 1 AND correo = "'.$correo.'"';
  return $this->execute($query);
}

public function get_caracteristicas_quinta($id){
  $query = 'SELECT caracteristica.nombre, caracteristica.id, caracteristica.imagen FROM caracteristica
  INNER JOIN quinta_caracteristica ON caracteristica.id = quinta_caracteristica.id_caracteristica WHERE quinta_caracteristica.id_quinta = '.$id;
  return $this->execute($query);
}
public function get_caracteristicas(){
  $query = 'SELECT * FROM caracteristica WHERE status = 1';
  return $this->execute($query);
}

public function get_zonas(){
  $query = 'SELECT * FROM zona WHERE status = 1';
  return $this->execute($query);
}

public function get_buscar_quintas($fecha, $evento, $zona){
  $query = 'SELECT quinta_reservacion.status, quinta.coordenadas, quinta.nombre,quinta.menor_precio,quinta.mayor_precio, quinta.fotos, quinta.id AS id_quinta, quinta.descripcion, quinta.calificacion FROM quinta
  INNER JOIN quinta_evento ON quinta.id = quinta_evento.id_quinta AND quinta_evento.id_evento = '.$evento.'
  LEFT JOIN quinta_reservacion ON quinta.id = quinta_reservacion.id_quinta AND quinta_reservacion.fecha ="'.$fecha.'"
  WHERE quinta.zona = '.$zona;
  return $this->execute($query);
}

public function get_comentarios($id){
  $query = 'SELECT * FROM reservacion WHERE comentarios <> "" AND id_quinta='.$id;
  return $this->execute($query);
}

public function get_servicios_quinta($id){
  $query = 'SELECT id_caracteristica FROM quinta_caracteristica WHERE id_quinta='.$id;
  return $this->execute($query);
}

public function get_eventos_quinta($id){
  $query = 'SELECT evento.nombre, evento.id FROM evento
  INNER JOIN quinta_evento ON evento.id = quinta_evento.id_evento WHERE quinta_evento.id_quinta = '.$id;
  return $this->execute($query);
}
public function get_eventos(){
  $query = 'SELECT * FROM evento WHERE status = 1';
  return $this->execute($query);
}

public function get_horarios($id){
  $query = 'SELECT * FROM horario WHERE id_quinta='.$id;
  return $this->execute($query);
}

public function get_reservaciones($id, $fecha){
  $query = 'SELECT * FROM reservacion WHERE id_quinta='.$id. ' AND fecha = "'.$fecha.'"';
  return $this->execute($query);
}

public function get_estado_fecha($id, $fecha){
  $query = 'SELECT * FROM quinta_reservacion WHERE id_quinta='.$id. ' AND fecha = "'.$fecha.'"';
  return $this->execute($query);
}

public function isDuplicate($nombre){
    $query = 'SELECT id FROM quinta WHERE nombre="'.$nombre.'" LIMIT 1';
    $result = $this->execute($query);
    if(count($result)>0){ return true; }else{ return false; }
}

public function get_resenas($id){
  $query = 'SELECT usuario.nombre, usuario.apellido,resena.calificacion, resena.resena, resena.created_at FROM usuario INNER JOIN resena ON resena.id_usuario = usuario.id WHERE resena.id_quinta = '.$id;
  return $this->execute($query);
}

public function getLastInserted(){ return $this->lastInserted; }

}
?>
