<?php
class Usuario extends TableObject{
    protected $correo,$clave,$nombre,$apellidos,$direccion,$tipo,$activo,$fecha;
    function __construct($correo=null, $clave=null, $nombre=null, $apellidos=null, $direccion=null, $tipo=null, $activo=null, $fecha=null) {
        $this->correo = $correo;
        $this->clave = $clave;
        $this->nombre = $nombre;
        $this->apellidos = $apellidos;
        $this->direccion = $direccion;
        $this->tipo = $tipo;
        $this->activo = $activo;
        $this->fecha = $fecha;
    }
    function getCorreo() {
        return $this->correo;
    }

    function getClave() {
        return $this->clave;
    }

    function getNombre() {
        return $this->nombre;
    }

    function getApellidos() {
        return $this->apellidos;
    }

    function getDireccion() {
        return $this->direccion;
    }

    function getTipo() {
        return $this->tipo;
    }

    function getActivo() {
        return $this->activo;
    }

    function getFecha() {
        return $this->fecha;
    }

    function setCorreo($correo) {
        $this->correo = $correo;
    }

    function setClave($clave) {
        $this->clave = $clave;
    }

    function setNombre($nombre) {
        $this->nombre = $nombre;
         return $this;
    }

    function setApellidos($apellidos) {
        $this->apellidos = $apellidos;
        return $this;
    }

    function setDireccion($direccion) {
        $this->direccion = $direccion;
    }

    function setTipo($tipo) {
        $this->tipo = $tipo;
    }

    function setActivo($activo) {
        $this->activo = $activo;
    }

    function setFecha($fecha) {
        $this->fecha = $fecha;
    }


}
