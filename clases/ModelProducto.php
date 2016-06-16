<?php

class ModelProducto extends Model{
      
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
    
    function dodeleteProducto($id){
        $bd = new Database();
        $gestor = new ManageProducto($bd);
        $r = $gestor->delete($id);
        $bd->close();
        return $r;
    }
    


}
