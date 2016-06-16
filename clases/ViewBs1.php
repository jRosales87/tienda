<?php

class ViewBs1 extends View{
     function render() {
        
        $contenido = file_get_contents('theme/bs1/_pre.html').$this->getModelo()->getText().file_get_contents('theme/bs1/_post.html');
        return $contenido;
     }
}
