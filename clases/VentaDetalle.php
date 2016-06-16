<?php
class VentaDetalle extends TableObject{
    protected $id,$idventa,$idproducto,$cantidad,$precio,$iva;
    function __construct($id=null, $idventa=null, $idproducto=null, $cantidad=null, $precio=null, $iva=null) {
        $this->id = $id;
        $this->idventa = $idventa;
        $this->idproducto = $idproducto;
        $this->cantidad = $cantidad;
        $this->precio = $precio;
        $this->iva = $iva;
    }
    function getId() {
        return $this->id;
    }

    function getIdventa() {
        return $this->idventa;
    }

    function getIdproducto() {
        return $this->idproducto;
    }

    function getCantidad() {
        return $this->cantidad;
    }

    function getPrecio() {
        return $this->precio;
    }

    function getIva() {
        return $this->iva;
    }

    function setId($id) {
        $this->id = $id;
    }

    function setIdventa($idventa) {
        $this->idventa = $idventa;
    }

    function setIdproducto($idproducto) {
        $this->idproducto = $idproducto;
    }

    function setCantidad($cantidad) {
        $this->cantidad = $cantidad;
    }

    function setPrecio($precio) {
        $this->precio = $precio;
    }

    function setIva($iva) {
        $this->iva = $iva;
    }


}
