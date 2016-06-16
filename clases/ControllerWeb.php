<?php

class ControllerWeb extends Controller {

    function principal() {
        $contenido = "";
        $postcontenido = '';
        $precontenido = '';
        $prueba ="<div class='row'><h1>Lista de Productos</h1>";
        
            $t = "
                <div class='row col-md-3'>
        <h1>{nombre}</h1>
        <p>{precio}€</p>
        <p>IVA: {iva}</p>
        <p>{total}€</p></div>";
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
            
        $prueba = $prueba."</div>";
        if(Request::req("login")==="ok"){
            $precontenido = '<div class="alert alert-success" role="alert">'.
                            '<strong>Well done!</strong> successfully.'.
                            '</div>';
        } elseif (Request::req("login")==="fail"){
            $precontenido = '<div class="alert alert-danger" role="alert">'.
                            '<strong>Bad done!</strong><br>You read this important alert message.'.
                            '</div>';
        }
        if($this->getSesion()->isLogged()){
            $this->setData('login', file_get_contents('theme/bs3/_logout.html'));
            $usuario = $this->getSesion()->getUser();
            $this->setData('usuario', $usuario->getNombre());
            
            if($usuario->getTipo() === "administrador"){
               $prueba =  file_get_contents('theme/bs3/_seleccionAdministradores.html');
               if(Request::req('accion')==='listarusuarios'){
            $postcontenido = file_get_contents('theme/bs3/_listausuarios.html');
        }
            }else if($usuario->getTipo()==="usuario"){
                $prueba =  file_get_contents('theme/bs3/_seleccionUsuarios.html');
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
            
        } else {
            $this->setData('login', file_get_contents('theme/bs3/_login.html'));
            
            
            if(Request::req("insertar")==="1"){
                    $precontenido = '<div class="alert alert-success" role="alert">'.
                            '<strong>Well done!</strong> successfully.'.
                            '</div>';
                }else if(Request::req("insertar")==="-1"){
                    $precontenido = '<div class="alert alert-danger" role="alert">'.
                            '<strong>Bad done!</strong><br>You read this important alert message.'.
                            '</div>';
                }
            //$this->setData('login', false);
        }
        
        if(Request::req("accion")==="vereditar"){
            $contenido = file_get_contents('theme/bs3/_editar.html');
            $postcontenido = "";
            $precontenido = "";
        }
        
        
        
        $this->setData('precontenido', $precontenido);
        $this->setData('contenido', $prueba);
        $this->setData('postcontenido',  $postcontenido);
        
    }
   
    
    
    
}