<?php
class Categoria extends TableObject{
    protected $id,$nombre;
    function __construct($id=null, $nombre=null) {
    $this->id = $id;
    $this->nombre = $nombre;
}
function getId() {
    return $this->id;
}

function getNombre() {
    return $this->nombre;
}

function setId($id) {
    $this->id = $id;
}

function setNombre($nombre) {
    $this->nombre = $nombre;
}


}



