<?php

class View {

    private $modelo;

    function __construct(Model $modelo) {
        $this->modelo = $modelo;
    }

    function getModelo() {
        return $this->modelo;
    }

    function render() {
        $contenido = $this->getModelo()->getData();
        return $contenido["contenido"];
    }
}