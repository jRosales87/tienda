<?php


class ManageCategoria {
  
    private $bd = null;
    private $tabla = "categoria";

    function __construct(Database $bd) {//
        $this->bd = $bd;
    }
    function get($id) {//ok
        $parametros = array();
        $parametros["id"] = $id;
        $this->bd->select($this->tabla, "*", "id = :id", $parametros);
        $fila = $this->bd->getRow();
        //var_dump($fila);
        $categoria = new Categoria();
        $categoria->set($fila);
        return $categoria;
    }

    function set(Categoria $categoria, $id = null) { //
        $parametrosSet = $categoria->get();
        $parametrosWhere = array();
        if ($id === null) {
            $parametrosWhere['id'] = $categoria->getId();
        } else {
            $parametrosWhere['id'] = $id;
        }
        return $this->bd->update($this->tabla, $parametrosSet, $parametrosWhere);
    }

    function insert(Categoria $categoria) {//
        $parametrosSet = $categoria->get();
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
            $categoria = new Categoria();
            $categoria->set($row);
            $r[] = $categoria;
        }
        return $r;
    }

    function getListSelect() {
        $this->bd->query($this->tabla, " id,nombre", array(), "id");
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
            $categoria = new Categoria();
            $categoria->set($fila);
            $str .= $categoria->json() . ",";
        }
        return "[" . substr($str, 0, -1) . "]";
    }

    function count($condicion="1=1", $parametros=array()){
        return $this->bd->count($this->tabla, $condicion, $parametros);
    }
    
    
}
