<?php
header('Content-Type: application/json');
$array = array("Cortés","Maya","Llorca");

$aleatorio = rand(0,2);
echo '{ "respuesta" : ' . json_encode($array[$aleatorio]) . ' }';
