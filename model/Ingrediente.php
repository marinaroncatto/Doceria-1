<?php

class Ingrediente {
    
    private $idIngredientes;
    private $descricao;
    
    public function __construct() {
        
    }
    
    public function __get($param) {
        return $this->$param;
    }
    
    public function __set($param,$value) {
        $this->$param = $value;
    }
  
    
    
}
?>