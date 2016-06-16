<?php
class FrontController {

    private $controlador;
    private $modelo;
    private $vista;

    function __construct(Router $router, $nombreRuta, $accion = null) {
        $nombreRuta = strtolower($nombreRuta);
        $accion = strtolower($accion);

        $ruta = $router->getRoute($nombreRuta);

        $nombreModelo = $ruta->getModel();
        $nombreVista = $ruta->getView();
        $nombreControlador = $ruta->getController();

        $this->modelo = new $nombreModelo();
        $this->vista = new $nombreVista($this->modelo);
        $this->controlador = new $nombreControlador($this->modelo);
        //echo("holacontrolador $nombreControlador $accion");
        if (method_exists($this->controlador, $accion)) {
            $this->controlador->$accion();
        } else {
            $this->controlador->principal();
        }
    }

     function write() {
        return $this->vista->render();
    }
}