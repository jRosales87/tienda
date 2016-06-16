<?php


class ProductoCategoria extends TableObject{
    protected $idproducto,$idcategoria;
    function __construct($idproducto=null, $idcategoria=null) {
        $this->idproducto = $idproducto;
        $this->idcategoria = $idcategoria;
    }
    function getIdproducto() {
        return $this->idproducto;
    }

    function getIdcategoria() {
        return $this->idcategoria;
    }

    function setIdproducto($idproducto) {
        $this->idproducto = $idproducto;
    }

    function setIdcategoria($idcategoria) {
        $this->idcategoria = $idcategoria;
    }


}
