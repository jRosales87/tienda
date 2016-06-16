<?php

class ControllerUsuario extends ControllerWeb {

    /*function principal() {
        parent::principal();
        $postcontenido = '';
        $precontenido = '';
        $contenido = ''; 
         $precontenido =  file_get_contents('theme/bs3/_listausuarios.html');
        $this->setData('precontenido', $precontenido);
        $this->setData('contenido', '<h1>Usuario</h1>');
        $this->setData('postcontenido',  $postcontenido);
    }*/
    function listarusuarios() {

       $precontenido="";
        $prueba ="<br><br><br><table class='table'> <tr>
        <td>Correo</td>
        <td>Nombre</td>
        <td>Apellido</td>
        <td>Direccion</td>
        <td>Permisos</td>
        <td>Activo</td>
        <td>Fecha</td>
        
    </tr>";
        if($this->getSesion()->isLogged()){
            $this->setData('login', file_get_contents('theme/bs3/_logout.html'));
            $usuario = $this->getSesion()->getUser();
            $this->setData('usuario', $usuario->getNombre());
             $t = "<tr>
        <td>{correo}</td>
        <td>{nombre}</td>
        <td>{apellidos}</td>
        <td>{direccion}</td>
        <td>{tipo}</td>
        <td>{activo}</td>
        <td>{fecha}</td>
        <td>
            <a class='borrar' href='index.php?ruta=usuario&accion=doborrar&correo={correo}'>Borrar</a>
            <a href='index.php?ruta=usuario&accion=formulariousuarios&correo={correo}'>Editar</a><br/>
        </td>
    </tr>";
        $r = $this->getModelo()->dolistar();
        $todo = "";
        foreach ($r as $key => $value) {
            $todo = str_replace('{correo}', $value->getCorreo(), $t);
            $todo = str_replace('{nombre}', $value->getNombre(), $todo);
            $todo = str_replace('{apellidos}', $value->getApellidos(), $todo);
            $todo = str_replace('{direccion}', $value->getDireccion(), $todo);
            $todo = str_replace('{tipo}', $value->getTipo(), $todo);
            $todo = str_replace('{activo}', $value->getActivo(), $todo);
            $todo = str_replace('{fecha}', $value->getFecha(), $todo);
           $prueba = $prueba . $todo;
            
        }
        if(Request::req('editarUsuario')==='1'){
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
        $prueba = $prueba."</table>";
        $this->setData("precontenido", $precontenido);
        $this->setData("postcontenido", "<a href='index.php'>Volver atrás</a>");
        $this->setData("contenido", $prueba);
        
    }
    function doborrar(){
        $correo = Request::req("correo");
        $r = $this->getModelo()->dolistar();
        foreach ($r as $key => $value) {
            if($value->getCorreo() === $correo){
                $res = $this->getModelo()->dodelete($value->getCorreo());
            }
            
        }
      if($res === 0){
                    $this->setData("contenido", "<h1>Error al borrar el usuario</h1>");
                }else {
                    $this->setData("contenido", "<h1>Usuario borrado satisfactoriamente</h1>");
                }
                $this->setData("precontenido", "");
                $this->setData("postcontenido", "<a href='index.php?ruta=usuario&accion=listarusuarios'>Volver Atrás </a>");
    }
    
    function formulariousuarios() {
        $formulario = file_get_contents('theme/bs3/_editar.html');
        if($this->getSesion()->isLogged()){
            $this->setData('login', file_get_contents('theme/bs3/_logout.html'));
            $usuario = $this->getSesion()->getUser();
            $this->setData('usuario', $usuario->getNombre());
            
            $usuarioEdit = Request::req('correo');
            $r = $this->getModelo()->dolistar();
        
        foreach ($r as $key => $value) {
            if($value->getCorreo() === $usuarioEdit){
                 $formulario = str_replace('{correo}', $value->getCorreo(), $formulario);
                 $formulario = str_replace('{clave}', $value->getClave(), $formulario);
                 $formulario = str_replace('{nombre}', $value->getNombre(), $formulario);
                 $formulario = str_replace('{apellidos}', $value->getApellidos(), $formulario);
                 $formulario = str_replace('{direccion}', $value->getDireccion(), $formulario);
                 $formulario = str_replace('{tipo}', $value->getTipo(), $formulario);
                 $formulario = str_replace('{activo}', $value->getActivo(), $formulario);
            }
        }
             $this->setData('contenido', $formulario);
        }
        else {
            $this->setData('login', file_get_contents('theme/bs3/_login.html'));
            $this->setData('contenido', "<h1>Requiere Permisos</h1>");
        }
            $this->setData('precontenido', "");
            $this->setData('postcontenido', "<a href='index.php?ruta=usuario&accion=listarusuarios'>Volver Atrás </a>");
        
    }
    
    function vercarrito(){
        $carrito = $this->getSesion()->getCarrito();
        $precontenido="";
        $prueba ="<br><br><br><table class='table'> <tr>
        <td>Nombre</td>
        <td>Precio</td>
        <td>Cantidad</td>
        <td>Iva</td>
        <td>Precio Total</td>
        
        
    </tr>";
        if($this->getSesion()->isLogged()){
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
             $t = "<tr>
        <td>{nombre}</td>
        <td>{precio}</td>
        <td>{cantidad}</td>
        <td>{iva}</td>
        <td>{preciototal}</td>
        <td>
            <a class='borrar' href='index.php?ruta=op&accion=borrarlista&id={id}'>Borrar</a>
        </td>
    </tr>";
        $r = $this->getSesion()->getCarrito();
        $todo = "";
        if(isset($r)){
        foreach ($r as $key => $value) {
            if($value->getCantidad()>0){
            $todo = str_replace('{nombre}', $value->getProducto()->getNombre(), $t);
            $todo = str_replace('{precio}', $value->getProducto()->getPrecio(), $todo);
            $todo = str_replace('{cantidad}', $value->getCantidad(), $todo);
            $todo = str_replace('{iva}', $value->getProducto()->getIva(), $todo);
            $todo = str_replace('{preciototal}', $value->getProducto()->getPrecioTotal()*$value->getCantidad(), $todo);
            $todo = str_replace('{id}', $value->getProducto()->getId(), $todo);
           $prueba = $prueba . $todo;
            }
            
        }
        }
        } else {
            $this->setData('login', file_get_contents('theme/bs3/_login.html'));
            //$this->setData('login', false);
        }
        $prueba = $prueba."</table>";
        $this->setData("precontenido", $precontenido);
        $this->setData("postcontenido", "<a href='index.php'>Volver atrás</a>");
        $this->setData("contenido", $prueba);
        
    }
    
 function editarusuarios() {
        $formulario = file_get_contents('theme/bs3/_editarUsuario.html');
        if($this->getSesion()->isLogged()){
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
            $this->setData('login', file_get_contents('theme/bs3/_logout.html'));
            $usuario = $this->getSesion()->getUser();
            $this->setData('usuario', $usuario->getNombre());
        
        
            
                 $formulario = str_replace('{correo}', $usuario->getCorreo(), $formulario);
                 $formulario = str_replace('{clave}', $usuario->getClave(), $formulario);
                 $formulario = str_replace('{nombre}', $usuario->getNombre(), $formulario);
                 $formulario = str_replace('{apellidos}', $usuario->getApellidos(), $formulario);
                 $formulario = str_replace('{direccion}', $usuario->getDireccion(), $formulario);
                 $formulario = str_replace('{tipo}', $usuario->getTipo(), $formulario);
                 $formulario = str_replace('{activo}', $usuario->getActivo(), $formulario);
            
        
             $this->setData('contenido', $formulario);
        }
        else {
            $this->setData('login', file_get_contents('theme/bs3/_login.html'));
            $this->setData('contenido', "<h1>Requiere Permisos</h1>");
        }
            $this->setData('precontenido', "");
            $this->setData('postcontenido', "<a href='index.php'>Volver Atrás </a>");
        
    }
    
    function registro() {
        $formulario = file_get_contents('theme/bs3/_registrar.html');
        
             $this->setData('contenido', $formulario);
        
            $this->setData('login', file_get_contents('theme/bs3/_login.html'));
            
        
            $this->setData('precontenido', "");
            $this->setData('postcontenido', "<a href='index.php?ruta=usuario&accion=listarusuarios'>Volver Atrás </a>");
        
    }
 

}