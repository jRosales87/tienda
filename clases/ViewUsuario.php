<?php

class ViewUsuario extends View{
       function render() {
           $contenido = $this->leer('theme/bs3/_index.html');
           $contenido = str_replace('{base}', Contants::BASE, $contenido);
           //echo '<br>Si entra login=ok se vería a continuación:';
           $entra = Request::req('login');
           echo $entra;
           
         if ($entra === "ok") {
           $contenido = str_replace('{registrar}', file_get_contents('theme/dpr/_registrar.html'), $contenido);  
           $contenido = str_replace('{logeado}', file_get_contents('theme/bs3/_logeado.html'), $contenido);
           
       } else{
           $contenido = str_replace('{login}', file_get_contents('theme/bs3/_login.html'), $contenido);   
         }        
           return $contenido;
     }
    
}
//         $contenido = str_replace('{registrar}', file_get_contents('theme/dpr/_editarUsuario.html'), $contenido);
//        $contenido = str_replace('{registrar}', file_get_contents('theme/dpr/_registrar.html'), $contenido);