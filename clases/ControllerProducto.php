<?php

class ControllerProducto extends ControllerWeb {

    function principal() {
        parent::principal();
        $postcontenido = '';
        $precontenido = '';
        $contenido = ''; 
         $precontenido =  "";
        $this->setData('precontenido', $precontenido);
        $this->setData('contenido', '<h1>Usuario</h1>');
        $this->setData('postcontenido',  $postcontenido);
    }
    function listarproductos() {

        $precontenido="";
         $prueba ="<br><br><br>
             <table class='table'><tr>
        <td>ID</td>
        <td>Nombre</td>
        <td>Precio</td>
        <td>IVA</td>
        
    </tr>";
        if($this->getSesion()->isLogged()){
            
            $t = "<tr>
        <td>{id}</td>
        <td>{nombre}</td>
        <td>{precio}</td>
        <td>{iva}</td>
        <td>
            <a class='borrar' href='index.php?ruta=producto&accion=doborrarProducto&id={id}'>Borrar</a>
            <a href='index.php?ruta=producto&accion=formularioproducto&id={id}'>Editar</a><br/>
        </td>
    </tr>";
        $r = $this->getModelo()->dolistar();
        $todo = "";
        foreach ($r as $key => $value) {
            $todo = str_replace('{id}', $value->getId(), $t);
            $todo = str_replace('{nombre}', $value->getNombre(), $todo);
            $todo = str_replace('{precio}', $value->getPrecio(), $todo);
            $todo = str_replace('{iva}', $value->getIva(), $todo);
           $prueba = $prueba . $todo;
            
        }
            $this->setData('login', file_get_contents('theme/bs3/_logout.html'));
            $usuario = $this->getSesion()->getUser();
            $this->setData('usuario', $usuario->getNombre());
            
            if(Request::req('editarProducto')==='1'){
                $precontenido = '<div class="alert alert-success" role="alert">'.
                            '<strong>Well done!</strong> successfully.'.
                            '</div>';
            }else if(Request::req('editarUsuario')==='0'){ $precontenido = '<div class="alert alert-danger" role="alert">'.
                            '<strong>Bad done!</strong><br>You read this important alert message.'.
                            '</div>';}
        } else {
            $this->setData('login', file_get_contents('theme/bs3/_login.html'));
            //$this->setData('login', false);
        }
        $prueba = $prueba."</table><br><br><a class='btn btn-success' href='index.php?ruta=producto&accion=formularioinsertar'>Insertar Producto</a><br>";
        $this->setData("precontenido", $precontenido);
        $this->setData("postcontenido", "<br><a href='index.php'>Volver atrás</a>");
        $this->setData("contenido", $prueba);
        
    }
    
    function formularioinsertar() {
        $formulario = file_get_contents('theme/bs3/_insertarProducto.html');
        if($this->getSesion()->isLogged()){
            $this->setData('login', file_get_contents('theme/bs3/_logout.html'));
            $usuario = $this->getSesion()->getUser();
            $this->setData('usuario', $usuario->getNombre());
                
             $this->setData('contenido', $formulario);
        }
        else {
            $this->setData('login', file_get_contents('theme/bs3/_login.html'));
            $this->setData('contenido', "<h1>Requiere Permisos</h1>");
        }
            $this->setData('precontenido', "");
            $this->setData('postcontenido', "<a href='index.php?ruta=producto&accion=listarproductos'>Volver Atrás </a>");
        
    }
    
    function doborrarProducto(){
        $id = Request::req("id");
        $r = $this->getModelo()->dolistar();
        foreach ($r as $key => $value) {
            if($value->getID() === $id){
                $res = $this->getModelo()->dodeleteProducto($value->getID());
            }
            
        }
      if($res === 0){
                    $this->setData("contenido", "<h1>Error al borrar el usuario</h1>");
                }else {
                    $this->setData("contenido", "<h1>Producto borrado satisfactoriamente</h1>");
                }
                $this->setData("precontenido", "");
                $this->setData("postcontenido", "<a href='index.php?ruta=producto&accion=listarproductos'>Volver Atrás </a>");
    }
    
   function formularioproducto() {
        $formulario = file_get_contents('theme/bs3/_editarProducto.html');
        if($this->getSesion()->isLogged()){
            $this->setData('login', file_get_contents('theme/bs3/_logout.html'));
            $usuario = $this->getSesion()->getUser();
            $this->setData('usuario', $usuario->getNombre());
            
            $productoEdit = Request::req('id');
            $r = $this->getModelo()->dolistar();
        
        foreach ($r as $key => $value) {
            if($value->getID() === $productoEdit){
                 $formulario = str_replace('{id}', $value->getID(), $formulario);
                 $formulario = str_replace('{nombre}', $value->getNombre(), $formulario);
                 $formulario = str_replace('{precio}', $value->getPrecio(), $formulario);
                 $formulario = str_replace('{iva}', $value->getIva(), $formulario);
                 
            }
        }
             $this->setData('contenido', $formulario);
        }
        else {
            $this->setData('login', file_get_contents('theme/bs3/_login.html'));
            $this->setData('contenido', "<h1>Requiere Permisos</h1>");
        }
            $this->setData('precontenido', "");
            $this->setData('postcontenido', "<a href='index.php?ruta=producto&accion=listarproductos'>Volver Atrás </a>");
        
    }
 
    function listarproductosUsuarios() {
    $precontenido="";
         $prueba ="<div class='row'><h1>Lista de Productos</h1>";
        if($this->getSesion()->isLogged()){
            $t = "
                <div class='row col-md-3'>
        <h1>{nombre}</h1>
        <p>{precio}€</p>
        <p>IVA: {iva}</p>
        <p>{total}€</p>
       
            <a class='btn btn-success' href='index.php?ruta=op&accion=docarrito&id={id}'>Añadir al Carro</a></div>";
        $r = $this->getModelo()->dolistar();
        $todo = "";
        foreach ($r as $key => $value) {
            $todo = str_replace('{id}', $value->getId(), $t);
            $todo = str_replace('{nombre}', $value->getNombre(), $todo);
            $todo = str_replace('{precio}', $value->getPrecio(), $todo);
            $todo = str_replace('{iva}', $value->getIva(), $todo);
            $todo = str_replace('{total}', ($value->getPrecio()*$value->getIva()/100)+$value->getPrecio(), $todo);
           $prueba = $prueba . $todo;
            
        }
            $this->setData('login', file_get_contents('theme/bs3/_logout.html'));
            $usuario = $this->getSesion()->getUser();
            if($usuario->getTipo()==="usuario"){
                $carritoplantilla =  file_get_contents('theme/bs3/_carrito.html');
                $carrito = $this->getSesion()->getCarrito();
                $cantidad = 0;
                if(isset($carrito)){
                    foreach ($carrito as $key => $value) {
                    $cantidad = $value->getCantidad() + $cantidad;    
            }
                }
                $carritoplantilla = str_replace('{cantidad}', $cantidad, $carritoplantilla);
                $this->setData('carrito',$carritoplantilla);
            }
            $this->setData('usuario', $usuario->getNombre());
            
            if(Request::req('editarProducto')==='1'){
                $precontenido = '<div class="alert alert-success" role="alert">'.
                            '<strong>Well done!</strong> successfully.'.
                            '</div>';
            }else if(Request::req('editarUsuario')==='0'){ $precontenido = '<div class="alert alert-danger" role="alert">'.
                            '<strong>Bad done!</strong><br>You read this important alert message.'.
                            '</div>';}
        } else {
            $this->setData('login', file_get_contents('theme/bs3/_login.html'));
            //$this->setData('login', false);
        }
        $prueba = $prueba."</div>";
        $this->setData("precontenido", $precontenido);
        $this->setData("postcontenido", "<br><br><br><br><a class='btn btn-success' href='index.php'>Volver atrás</a>");
        $this->setData("contenido", $prueba);
        
    }

}