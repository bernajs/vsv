<?php

require_once("class.helper.php");

class Usuario extends Helper {
    var $nombre;
    var $apellido;
    var $correo;
    var $telefono;
    var $celular;
    var $contrasena;
    var $observaciones;
    var $status;
    var $created_at;
    var $modified_at;
    var $id;

    public function __construct(){ $this->sql = new db(); }

    public function db($key){
        switch($key){
            case "insert":
                $query = "INSERT INTO usuario (nombre,apellido,correo,telefono,celular,contrasena,observaciones,status,created_at)
                VALUES (
                '".$this->nombre."',
                '".$this->apellido."',
                '".$this->correo."',
                '".$this->telefono."',
                '".$this->celular."',
                '".$this->contrasena."',
                '".$this->observaciones."',
                '".$this->status."',
                '".$this->created_at."'
                )";
                break;
            case "update":
                $query = "UPDATE usuario
                SET
                nombre='".$this->nombre."',
                apellido='".$this->apellido."',
                correo='".$this->correo."',
                telefono='".$this->telefono."',
                celular='".$this->celular."',
                contraesena='".$this->contraesena."',
                observaciones='".$this->observaciones."',
                status='".$this->status."',
                modified_at='".$this->modified_at."'
                WHERE id=".$this->id;
                break;
            case "delete": $query = "DELETE FROM usuario WHERE id=".$this->id;
                break;
    }
    $lid = false;
    if($key=="insert"){ $lid = true; }
    $this->execute($query,$lid);
}

public function get_data($id = null){
    $query = 'SELECT * FROM usuario WHERE status = 1 AND id = '.$id;
    return $this->execute($query);
}

public function get_quintas($id){
  $query = 'SELECT quinta.nombre, quinta.fotos, quinta.descripcion FROM usuario
  INNER JOIN quinta ON quinta.id_usuario = usuario.id WHERE usuario.id ='.$id;
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

public function isDuplicate($nombre){
    $query = 'SELECT id FROM usuario WHERE correo="'.$nombre.'" LIMIT 1';
    $result = $this->execute($query);
    if(count($result)>0){ return true; }else{ return false; }
}
public function isRegistered($user, $pass){
    $query = 'SELECT * FROM usuario WHERE correo = "'.$user.'" AND contrasena = "'.$pass.'" AND status = 1 LIMIT 1';
    return $this->execute($query);
}
public function getLastInserted(){ return $this->lastInserted; }

}
?>
