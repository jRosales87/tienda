<?php

class ModelOp extends Model {

    function doLogin($email, $password) {
        $bd = new Database();
        $gestor = new ManageUsuario($bd);
        $objSe = new Session;
        $user = $gestor->get($email);
        $emailbase = $user->getCorreo();
        $passbase = $user->getClave();


        echo 'Entrada de parámetros a la Función doLogin desde ControllerUsuario ';
        echo "<br>emil mandado como parámetro al metodo:$email";
        echo "<br>password mandado como parámetro al metodo:$password<br>";
        echo "<br>emilbasedatos:<br>$emailbase<br>";
        echo "passwordbasedatos:<br>$passbase<br>";

        if ($email === null && $password === null) {
            return false;
        }
        if ($emailbase === $email && $passbase === $password) {
            //echo "devuelve . '$usuario'. <br>";
            return $user;
        }
        echo ('devuelve false');
        return false;
    }

    function doinsert(Usuario $usuario) {
        //echo $usuario;
        $bd = new Database();
        $gestor = new ManageUsuario($bd);
        $r = $gestor->insert($usuario);
        $bd->close();
        return $r;
    }
    
        function doedit(Usuario $usuario){
        $bd = new Database();
        $gestor = new ManageUsuario($bd);
        $r = $gestor->set($usuario);
        $bd->close();
        return $r;
    }
    
     function doinsertProducto(Producto $producto) {
        //echo $usuario;
        $bd = new Database();
        $gestor = new ManageProducto($bd);
        $r = $gestor->insert($producto);
        $bd->close();
    }
    
      function doeditProducto(Producto $producto){
        $bd = new Database();
        $gestor = new ManageProducto($bd);
        $r = $gestor->set($producto);
        $bd->close();
        return $r;
    }
   
   
    function docomprar($id){
        $carrito = new Carrito();
        $bd = new Database();
        $gestor = new ManageProducto($bd);
        $r = $gestor->getList();
        foreach ($r as $key => $value) {
            if($id === $value->getId()){
                $carrito->add($value);
            }
        }
    }
    
    

}








////    function doset(Usuario $usuario) {
//        //echo $usuario;
//        $bd = new Database();
//        $gestor = new ManageUsuario($bd);
//        $r = $gestor->set($usuario);
//        $bd->close();
//    }



//    function principal() {
//        
//    }