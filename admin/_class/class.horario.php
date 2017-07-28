<?php

require_once("class.helper.php");

class Horario extends Helper {
    var $id_quinta;
    var $nombre;
    var $descripcion;
    var $inicio;
    var $fin;
    var $precio;
    var $created_at;
    var $modified_at;
    var $status;
    var $id;

    public function __construct(){ $this->sql = new db(); }

    public function db($key){
        switch($key){
            case "insert":
                $query = "INSERT INTO horario (id_quinta,nombre,precio,descripcion,inicio,fin,created_at)
                VALUES (
                '".$this->id_quinta."',
                '".$this->nombre."',
                '".$this->precio."',
                '".$this->descripcion."',
                '".$this->inicio."',
                '".$this->fin."',
                '".$this->created_at."'
                )";
                echo $query;
                break;
            case "update":
                $query = "UPDATE horario
                SET
                nombre='".$this->nombre."',
                precio='".$this->precio."',
                descripcion='".$this->descripcion."',
                inicio='".$this->inicio."',
                fin='".$this->fin."',
                modified_at='".$this->modified_at."'
                WHERE id=".$this->id;
                echo $query;
                break;
            case "delete": $query = "DELETE FROM horario WHERE id=".$this->id;
                break;
    }
    $lid = false;
    if($key=="insert"){ $lid = true; }
    $this->execute($query,$lid);
}

public function get_data($id = null){
    $query = 'SELECT * FROM horario WHERE id='.$id;
    // if($id!=NULL) $query.=" AND id=".$id."";
    if($this->status!=NULL) $query .= " AND status=".$this->status;
    if($this->search!=NULL) $query .= " AND ".$this->search_field." LIKE '%".$this->search."%'";
    if($this->order!=NULL) $query .= " ORDER BY ".$this->order;
    if($this->limit!=NULL) $query .= " LIMIT ".$this->limit;
    return $this->execute($query);
}

public function get_horarios_quinta($id){
  $query = 'SELECT * FROM horario WHERE id_quinta='.$id;
  return $this->execute($query);
}

public function getLastInserted(){ return $this->lastInserted; }

}
?>
