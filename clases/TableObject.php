<?php
class TableObject {
    /*function __construct($this as $key => $valor) {
        $r=;
        
    }*/
 function __toString() {
     $r='';
     foreach ($this as $indice => $valor){
         $r.="[$indice => $valor].</br>";
     }
     return $r;
 }
 function get(){
     $r=array();
     foreach ($this as $indice => $valor){
        $r[$indice]= $valor;
     }
     return $r;
 }
 function set($datos,$inicio=0){
     $i=0;
     foreach ($this as $indice => $valor){
        $this->$indice = $datos[$i+$inicio];
        $i++;
     }
 }
 function read($clases="Request",$metodo="req"){      
     foreach ($this as $indice => $valor){
        $this->$indice = $clases::$metodo($indice);
     }     
 }
 public function json(){
     $str='';
     foreach ($this as $indice => $valor){
        $str .= '"' . $indice.'" : ' . json_encode(htmlspecialchars_decode($valor)) . ',';
     }
     return "{" . substr($str,0,-1) . "}";
 }
}
