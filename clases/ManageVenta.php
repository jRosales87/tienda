<?php

class ManageVenta {
    //$id,$correo,$fecha,$pagado;
    private $bd = null;
    private $tabla = "venta";

    function __construct(Database $bd) {//
        $this->bd = $bd;
    }
     function get($id) {//
        $parametros = array();
        $parametros["id"] = $id;
        $this->bd->select($this->tabla, "*", "id = :id", $parametros);
        $fila = $this->bd->getRow();
        //var_dump($fila);
        $venta = new Venta();
        $venta->set($fila);
        return $venta;
     }
    function set(Venta $venta, $id = null) { //
        $parametrosSet = $venta->get();
        $parametrosWhere = array();
        if ($id === null) {
            $parametrosWhere['id'] = $venta->getId();
        } else {
            $parametrosWhere['id'] = $venta;
        }
        return $this->bd->update($this->tabla, $parametrosSet, $parametrosWhere);
    }
    function insert(Venta $venta) {//
        $parametrosSet = $venta->get();
        //var_dump($parametrosSet);
        return $this->bd->insert($this->tabla, $parametrosSet);
    }

    function delete($id) {//
        $parametros = array();
        $parametros['id'] = $id;
        return $this->bd->delete($this->tabla, $parametros);
    }

    function getList($pagina = 1, $orden = "1", $nrpp = Contants::NRPP) {//ok
        $ordenPredeterminado = "$orden, id";
        if ($orden === "" || $orden === null) {
            $ordenPredeterminado = "id";
        }
        $registroInicial = ($pagina - 1) * $nrpp;
        $this->bd->select($this->tabla, "*", "1=1", array(), $ordenPredeterminado, "$registroInicial,$nrpp");
        $r = array();
        /* El 1,10 del ultimo parametro es el limite de registros por pagina */
        while ($row = $this->bd->getRow()) {
            $venta = new Venta();
            $venta->set($row);
            $r[] = $venta;
        }
        return $r;
    }

    function getListSelect() {
        $this->bd->query($this->tabla, "id,correo,fecha,pagado", array(), "id");
        $array = array();
        while ($row = $this->bd->getRow()) {
            $array[$row[0]] = $row[1];
        }
        return $array;
    }

    public function getListJson() {//
        $this->bd->query($this->tabla);
        $str = '';
        while($fila=$this->bd->getRow()){
            $venta = new Venta();
            $venta->set($fila);
            $str .= $venta->json() . ",";
        }
        return "[" . substr($str, 0, -1) . "]";
    }
    function count($condicion="1=1", $parametros=array()){
        return $this->bd->count($this->tabla, $condicion, $parametros);
    }
}
