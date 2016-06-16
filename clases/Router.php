<?php

class Router {

    private $rutas = array();

    function __construct() {
        $this->rutas['principal'] = new Route('ModelWeb', 'ViewWeb', 'ControllerWeb');
        $this->rutas['op'] = new Route('ModelOp', 'ViewOp', 'ControllerOp');
        $this->rutas['usuario'] = new Route('ModelUsuario', 'ViewWeb', 'ControllerUsuario');
        $this->rutas['producto'] = new Route('ModelProducto', 'ViewWeb', 'ControllerProducto');
        $this->rutas['insertar'] = new Route('ModelWeb', 'ViewWeb', 'ControllerWeb');
        $this->rutas['editar'] = new Route('ModelOp', 'ViewWeb', 'ControllerOp');
        $this->rutas['carrito'] = new Route('ModelUsuario', 'ViewWeb', 'ControllerUsuario');
        
    }

    function getRoute($ruta) {
        if (!isset($this->rutas[$ruta])) {
            return $this->rutas['principal'];
        }
        return $this->rutas[$ruta];
    }

}
