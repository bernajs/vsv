<?php

require_once("class.helper.php");

class Zona extends Helper {
    var $nombre;
    var $created_at;
    var $modified_at;
    var $status;
    var $id;

    public function __construct(){ $this->sql = new db(); }

    public function db($key){
        switch($key){
            case "insert":
                $query = "INSERT INTO zona (nombre,status,created_at)
                VALUES (
                '".$this->nombre."',
                '".$this->status."',
                '".$this->created_at."'
                )";
                break;
            case "update":
                $query = "UPDATE zona
                SET
                nombre='".$this->nombre."',
                status='".$this->status."',
                modified_at='".$this->modified_at."'
                WHERE id=".$this->id;
                break;
            case "delete": $query = "DELETE FROM zona WHERE id=".$this->id;
                break;

    }
    $lid = false;
    if($key=="insert"){ $lid = true; }
    $this->execute($query,$lid);
}

public function get_data($id = null){
    $query = 'SELECT * FROM zona WHERE id > 0';
    if($id!=NULL) $query.=" AND id=".$id."";
    if($this->status!=NULL) $query .= " AND status=".$this->status;
    if($this->search!=NULL) $query .= " AND ".$this->search_field." LIKE '%".$this->search."%'";
    if($this->order!=NULL) $query .= " ORDER BY ".$this->order;
    if($this->limit!=NULL) $query .= " LIMIT ".$this->limit;
    return $this->execute($query);
}
public function getLastInserted(){ return $this->lastInserted; }

public function isDuplicate($nombre){
  $query = 'SELECT id FROM zona WHERE nombre="'.$nombre.'" LIMIT 1';
  $result = $this->execute($query);
  if (count($result)>0) {return true;} else {return false;}
}
}
?>
