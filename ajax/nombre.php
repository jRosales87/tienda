<?php
header('Content-Type: application/json');
$array = array("Juan ","Miguel","Fran");
//$array = array("a"=>"Juan José","b"=>"Migue","c"=>"Fran");
$aleatorio = rand(0,2);
$param = $_GET["param"];
echo '{ "respuesta" : "'   . $array[$aleatorio] . ' ' . $param . ' "}';


//echo '{ "respuesta" : ' . json_encode($param . "  \" " . $array[$aleatorio]) . ' }';
//echo json_encode($array);
//sleep(3);
//respuesta:
//texto-no
//html-no
//xml-si -> responseXML
//json-si -> responseTEXt
//
