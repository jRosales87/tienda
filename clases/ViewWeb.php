<?php

class ViewWeb extends View {

    function render() {
        $contenido = file_get_contents('theme/bs3/_index.html');
        $data = $this->getModelo()->getData();
        foreach ($data as $key => $value) {
            $contenido = str_replace('{' . $key . '}', $value, $contenido);
        }
        return $contenido;
        
    }
     
}
