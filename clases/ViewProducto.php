<?php
class ViewProducto extends ViewBs2{
    function render() {
           /*$contenido = file_get_contents('theme/bs3/index.html');
           $texto = $this->getModelo()->getText();*/
           $contenido = $this->leer('theme/bs3/_index.html');
           $contenido = str_replace('{base}', Contants::BASE, $contenido);
           
         if (Request::req("login") === "ok") {
           $contenido = str_replace('{login}', file_get_contents('theme/bs3/_logeado.html'), $contenido);
       } else{
           $contenido = str_replace('{login}', file_get_contents('theme/bs3/_login.html'), $contenido);   
         }
           
           //////*acceso a la base de datos y mostrar todos los elementos sustituyendo el contenido*//////
           $contenido = str_replace('{contenido}', file_get_contents('theme/bs3/_logeado.html'), $contenido);
           return $contenido;
     }
}