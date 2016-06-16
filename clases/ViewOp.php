<?php


class ViewOp extends View {

    function render() {
        $contenido = $this->getModelo()->getData();
        $contenido = $contenido["redireccion"];
        header("Location:$contenido");
        exit();
    }
}