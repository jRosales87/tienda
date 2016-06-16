<?php

class Route {

    private $modelo;
    private $vista;
    private $controlador;

    function __construct($modelo, $vista, $controlador) {
        $this->modelo = $modelo;
        $this->vista = $vista;
        $this->controlador = $controlador;
    }
    function getModel() {
        return $this->modelo;
    }

    function getView() {
        return $this->vista;
    }

    function getController() {
        return $this->controlador;
    }

   /* function setModel($modelo) {
        $this->modelo = $modelo;
    }

    function setView($vista) {
        $this->vista = $vista;
    }

    function setController($controlador) {
        $this->controlador = $controlador;
    }*/


}