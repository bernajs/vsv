<?php

require_once("class.helper.php");

class Favorito extends Helper {
    var $usuario;
    var $quinta;

    public function __construct(){ $this->sql = new db(); }

    public function db($key){
        switch($key){
            case "insert":
                $query = "INSERT INTO favorito (usuario,quinta)
                VALUES (
                '".$this->usuario."',
                '".$this->quinta."'
                )";
                break;
            case "delete": $query = "DELETE FROM favorito WHERE id=".$this->id;
                break;

    }
    $lid = false;
    if($key=="insert"){ $lid = true; }
    $this->execute($query,$lid);
}

public function getData($id = null){
    $query = 'SELECT * FROM admin WHERE id > 0';
    if($id!=NULL) $query.=" AND id=".$id."";
    if($this->status!=NULL) $query .= " AND status=".$this->status;
    if($this->search!=NULL) $query .= " AND ".$this->search_field." LIKE '%".$this->search."%'";
    if($this->order!=NULL) $query .= " ORDER BY ".$this->order;
    if($this->limit!=NULL) $query .= " LIMIT ".$this->limit;
    return $this->execute($query);
}
public function getLastInserted(){ return $this->lastInserted; }
}
?>
