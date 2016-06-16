<?php

class ModelUsuario extends Model {

    function doLogin($email, $password) {
        $bd = new Database();
        $gestor = new ManageUsuario($bd);
        $objSe = new Session;        
        $user = $gestor->get($email);
        $emailbase = $user->getCorreo();
        $passbase = $user->getClave();
        $profile = $user->getTipo();
        echo 'Entrada al Metodo desde ControllerUsuario ';        
        echo "<br>emil mandado como parámetro al metodo:$email";
        echo "<br>password mandado como parámetro al metodo:$passbase<br>";
        echo "<br>emilbasedatos:<br>$emailbase<br>";
        if ($emailbase === $email && $passbase === $password) {
             echo ('devuelve true');
             return true;
           
        }
         echo ('devuelve false');
        return false;
    }
    function dolistar() {
        $bd = new Database();
        $gestor = new ManageUsuario($bd);
        $page = Request::get('page');
        if ($page === null || $page === "") {
            $page = 1;
        }
        $registros = $gestor->count();
        $paginas = ceil($registros / Contants::NRPP); //ceil devuelve el primer entero >= que el numero que tengo
        $order = Request::get("order");
        $sort = Request::get("sort");
        $orden = "$order $sort";

         $usuarios = $gestor->getList($page, trim($orden));
        return $usuarios;
      
    }
    function doLogout(){
        var_dump($user);
        echo 'hola';
        
    }
     function dodelete($correo){
        $bd = new Database();
        $gestor = new ManageUsuario($bd);
        $r = $gestor->delete($correo);
        $bd->close();
        return $r;
    }
    
    
    
    
    

}
  /*$op = Request::get("op");
        $r = Request::get("r");

        foreach ($usuarios as $indice => $usuario) {
             $usuario->getCorreo();
             $usuario->getClave();
             $usuario->getNombre();
             $usuario->getApellidos();
             $usuario->getDireccion();
             $usuario->getTipo();
             $usuario->getActivo();
             $usuario->getFecha();
             
        }*/