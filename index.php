<?php

require 'clases/Autoload.php';
$frontController = new FrontController(new Router(), Request::req('ruta'), Request::req('accion'));
echo $frontController->write();