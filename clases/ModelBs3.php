<?php

class ModelBs3 extends Model{
     function render() {
           $contenido =  $this->leer('../theme/bs3/_index.html');
       return $contenido;
     }
}
