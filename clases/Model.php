<?php

class Model {

    private $data = array();

    function __construct() {
    }

    function getData() {
        return $this->data;
    }

    function setData($data) {
        $this->data = $data;
    }

}