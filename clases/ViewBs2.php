<?php

class ViewBs2 extends View {
    function render() {
        return $this -> leer('theme/bs2/index.html');
    }
        function leer($archivo){
        $contenido = file_get_contents($archivo);
        $texto = $this->getModelo()->getText();
        $contenido = str_replace('{contenido}',$texto, $contenido);
       
        return $contenido;
     }
}
