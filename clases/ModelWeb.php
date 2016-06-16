<?php

class ModelWeb extends Model {

    function __construct() {
        parent::__construct();
        $data = $this->getData();
        $data["titulo"] = "Mi Tienda";
        $data["base"] = Constants::BASE;
        $data["login"] = "";
        $data["precontenido"] = "";
        $data["contenido"] = "";
        $data["postcontenido"] = "";
        $data["usuario"] = "";
        $data["paneldeadministracion"] = "";
        $data["carrito"] = "";
        $this->setData($data);
    }
    function doinsert(Usuario $usuario) {
        //echo $usuario;
        $bd = new Database();
        $gestor = new ManageUsuario($bd);
        $r = $gestor->insert($usuario);
        $bd->close();
    }
    
    function dolistar() {
        $bd = new Database();
        $gestor = new ManageProducto($bd);
        $page = Request::get('page');
        if ($page === null || $page === "") {
            $page = 1;
        }
        $registros = $gestor->count();
        $paginas = ceil($registros / Contants::NRPP); //ceil devuelve el primer entero >= que el numero que tengo
        $order = Request::get("order");
        $sort = Request::get("sort");
        $orden = "$order $sort";

         $producto = $gestor->getList($page, trim($orden));
        return $producto;
      
    }
    
    
    
    
}