<?php

class ManageProductoCategoria {
    private $bd = null;
    private $tabla = "productocategoria";
//$idproducto,$idcategoria;
    function __construct(Database $bd) {//
        $this->bd = $bd;
    }
    function get($idproducto) {//
        $parametros = array();
        $parametros["idproducto"] = $idproducto;
        $this->bd->select($this->tabla, "*", "idproducto = :idproducto", $parametros);
        $fila = $this->bd->getRow();
        //var_dump($fila);
        $productocategoria = new ProductoCategoria();
        $productocategoria->set($fila);
        return $productocategoria;
    }

    function set(ProductoCategoria $productocategoria, $idproducto = null) { //
        $parametrosSet = $productocategoria->get();
        $parametrosWhere = array();
        if ($idproducto === null) {
            $parametrosWhere['idproducto'] = $productocategoria-> getIdproducto();
        } else {
            $parametrosWhere['idproducto'] = $idproducto;
        }
        return $this->bd->update($this->tabla, $parametrosSet, $parametrosWhere);
    }

    function insert(ProductoCategoria $productocategoria) {//
        $parametrosSet = $productocategoria->get();
        //var_dump($parametrosSet);
        return $this->bd->insert($this->tabla, $parametrosSet);
    }

    function delete($idproducto) {//
        $parametros = array();
        $parametros['idproducto'] = $idproducto;
        return $this->bd->delete($this->tabla, $parametros);
    }

    function getList($pagina = 1, $orden = "1", $nrpp = Contants::NRPP) {//ok
        $ordenPredeterminado = "$orden, idproducto";
        if ($orden === "" || $orden === null) {
            $ordenPredeterminado = "idproducto";
        }
        $registroInicial = ($pagina - 1) * $nrpp;
        $this->bd->select($this->tabla, "*", "1=1", array(), $ordenPredeterminado, "$registroInicial,$nrpp");
        $r = array();
        /* El 1,10 del ultimo parametro es el limite de registros por pagina */
        while ($row = $this->bd->getRow()) {
            $productocategoria = new ProductoCategoria();
            $productocategoria->set($row);
            $r[] = $productocategoria;
        }
        return $r;
    }

    function getListSelect() {
        $this->bd->query($this->tabla, "idproducto,idcategoria", array(), "idproducto");
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
            $producto = new Producto();
            $producto->set($fila);
            $str .= $producto->json() . ",";
        }
        return "[" . substr($str, 0, -1) . "]";
    }
    function count($condicion="1=1", $parametros=array()){
        return $this->bd->count($this->tabla, $condicion, $parametros);
    }
}
