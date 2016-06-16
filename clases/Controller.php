<?php

class Controller {

    private $modelo;
    private $sesion;

    function __construct(Model $modelo) {
        $this->modelo = $modelo;
        $this->sesion = new Session();
    }

    function getModelo() {
        return $this->modelo;
    }

    function getSesion(){
        return $this->sesion;
    }

    function isAdministrador(){
        $usuario = $this->getUser();
        if($usuario!=null){
            return $usuario->getTipo() === "administrador";
        }
        return false;
    }

    function getUser(){
        return $this->sesion->getUser();
    }

    function setData($nombre, $valor){
        $data = $this->getModelo()->getData();
        $data[$nombre] = $valor;
        $this->getModelo()->setData($data);
    }
}