<?php

class ControllerOp extends Controller {

    function login() {
        $correo = Request::req("correo");
        $password = Request::req("password");
        $r = $this->getModelo()->doLogin($correo, $password);
        if ($r === false) {
            $this->getSesion()->destroy();
            $this->setData('redireccion', '.?login=fail');
        } else {
            $this->getSesion()->setUser($r);
            $this->setData('redireccion', '.?login=ok');
        }
    }

    function insertar() {
        $correo = Request::post("email");
        $clave = Request::post("clave");
        $nombre = Request::post("nombre");
        $apellidos = Request::post("apellidos");
        $direccion = Request::post("direccion");
        $tipo = Request::post("tipo");
        $activo = Request::post("activo");
        $fecha = Request::post("fecha");
        $usuario = new Usuario($correo, $clave, $nombre, $apellidos, $direccion, $tipo, $activo, $fecha);
        $rinsercion = $this->getModelo()->doinsert($usuario);
        $this->setData('redireccion', '.?insertar=' . $rinsercion);
    }
    
    function doeditar() {
        $correo = Request::post("email");
        $clave = Request::post("clave");
        $nombre = Request::post("nombre");
        $apellidos = Request::post("apellidos");
        $direccion = Request::post("direccion");
        $tipo = Request::post("tipo");
        $activo = Request::post("activo");
        $usuario = new Usuario($correo, $clave, $nombre, $apellidos, $direccion, $tipo, $activo);
        $r = $this->getModelo()->doedit($usuario);
        $this->setData('redireccion', '.?ruta=usuario&accion=listarusuarios&editarUsuario=' . $r);
    }
    
    function doeditarpropio() {
        $correo = Request::post("email");
        $clave = Request::post("clave");
        $nombre = Request::post("nombre");
        $apellidos = Request::post("apellidos");
        $direccion = Request::post("direccion");
        $tipo = Request::post("tipo");
        $activo = Request::post("activo");
        $usuario = new Usuario($correo, $clave, $nombre, $apellidos, $direccion, $tipo, $activo);
        $r = $this->getModelo()->doedit($usuario);
        $this->getSesion()->setUser($usuario);
        $this->setData('redireccion', '.?editarUsuario=' . $r);
    }
    
    function insertarProducto(){
        $id = Request::post("id");
        $nombre = Request::post("nombre");
        $precio = Request::post("precio");
        $iva = Request::post("iva");
        $producto = new Producto($id, $nombre, $precio, $iva);
        $r = $this->getModelo()->doinsertProducto($producto);
         $this->setData('redireccion', '.?ruta=producto&accion=listarproductos&insertarProducto=' . $r);
        
    }
    
    
    function doeditarProducto() {
        $id = Request::post("id");
        $nombre = Request::post("nombre");
        $precio = Request::post("precio");
        $iva = Request::post("iva");
        
        $producto = new Producto($id, $nombre, $precio, $iva);
        $r = $this->getModelo()->doeditProducto($producto);
        $this->setData('redireccion', '.?ruta=producto&accion=listarproductos&editarProducto=' . $r);
    }
    
    function docarrito(){
        $id = Request::get("id");
        $r = $this->getModelo()->docomprar($id);
        $this->setData('redireccion', '.?ruta=producto&accion=listarproductosusuarios');
    }
         
       function borrarlista(){
        $id = Request::req('id');
        $carrito = $this->getSesion()->getCarrito();
        if(isset($carrito)){
        foreach ($carrito as $key => $value) {
            if($id===$value->getProducto()->getId()){
                $value->sub($value->getProducto());
                $this->setData('redireccion', '.?ruta=carrito&accion=vercarrito');
            }
        }
        
        
    }
    
    }
    function logout(){
        $this->getSesion()->destroy();
        $this->setData('redireccion', '.');
    }
                function principal() {
        $this->setData('redireccion', '.');
    }

}
