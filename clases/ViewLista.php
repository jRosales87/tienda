<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of ViewLista
 *
 * @author Fran
 */
class ViewLista extends View {

    function render() {
        $contenido = file_get_contents('theme/bs3/_index.html');
        $data = $this->getModelo()->getData();
        foreach ($data as $key => $value) {
            $contenido = str_replace('{' . $key . '}', $value, $contenido);
        }
        return $contenido;
        
    }

}
