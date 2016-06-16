<?php
class Venta extends TableObject{
    protected $id,$correo,$fecha,$pagado;
    function __construct($id=null, $correo=null, $fecha=null, $pagado=null) {
        $this->id = $id;
        $this->correo = $correo;
        $this->fecha = $fecha;
        $this->pagado = $pagado;
    }
    function getId() {
        return $this->id;
    }

    function getCorreo() {
        return $this->correo;
    }

    function getFecha() {
        return $this->fecha;
    }

    function getPagado() {
        return $this->pagado;
    }

    function setId($id) {
        $this->id = $id;
    }

    function setCorreo($correo) {
        $this->correo = $correo;
    }

    function setFecha($fecha) {
        $this->fecha = $fecha;
    }

    function setPagado($pagado) {
        $this->pagado = $pagado;
    }


}
