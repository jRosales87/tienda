<?php

class ManageUsuario {

    private $bd = null;
    private $tabla = "usuario";

    function __construct(Database $bd) {//ok
        $this->bd = $bd;
    }

    function get($correo) {//ok
        $parametros = array();
        $parametros["correo"] = $correo;
        $this->bd->select($this->tabla, "*", "correo = :correo", $parametros);
        $fila = $this->bd->getRow();
        //var_dump($fila);
        $usuario = new Usuario();
        $usuario->set($fila);
        return $usuario;
    }
    function count($condicion="1=1", $parametros=array()){
        return $this->bd->count($this->tabla, $condicion, $parametros);
    }
    function set(Usuario $usuario, $correo = null) { //ok
        $parametrosSet = $usuario->get();
        $parametrosWhere = array();
        if ($correo === null) {
            $parametrosWhere['correo'] = $usuario->getCorreo();
        } else {
            $parametrosWhere['correo'] = $correo;
        }
        return $this->bd->update($this->tabla, $parametrosSet, $parametrosWhere);
    }

    function insert(Usuario $usuario) {//ok
        $parametrosSet = $usuario->get();
        //var_dump($parametrosSet);
        return $this->bd->insert($this->tabla, $parametrosSet, false);
    }

    function delete($correo) {//ok
        $parametros = array();
        $parametros['correo'] = $correo;
        return $this->bd->delete($this->tabla, $parametros);
    }

    function getList($pagina = 1, $orden = "1", $nrpp = Contants::NRPP) {//ok
        $ordenPredeterminado = "$orden, correo";
        if ($orden === "" || $orden === null) {
            $ordenPredeterminado = "correo";
        }
        $registroInicial = ($pagina - 1) * $nrpp;
        $this->bd->select($this->tabla, "*", "1=1", array(), $ordenPredeterminado, "$registroInicial,$nrpp");
        $r = array();
        /* El 1,10 del ultimo parametro es el limite de registros por pagina */
        while ($row = $this->bd->getRow()) {
            $user = new Usuario();
            $user->set($row);
            $r[] = $user;
        }
        return $r;
    }

    function getListSelect() {//ok
        $this->bd->query($this->tabla, " correo,clave,nombre,apellidos,direccion,tipo,activo,fecha", array(), "correo");
        $array = array();
        while ($row = $this->bd->getRow()) {
            $array[$row[0]] = $row[1];
        }
        return $array;
    }

    public function getListJson() {//ok
        $this->bd->query($this->tabla);
        $str = '';
        while($fila=$this->bd->getRow()){
            $usuario = new Usuario();
            $usuario->set($fila);
            $str .= $usuario->json() . ",";
        }
        return "[" . substr($str, 0, -1) . "]";
    }

}