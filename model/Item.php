<?php

class Item {
    private $iditem;
    private $nome;
    private $validade;
    private $valor;
    private $idingredientes;
    /*
     para chaves estrangeira podemos tanto tratar como um atributo normal
     no php e montar o objeto extarnamente via banco quanto no modo
     * tradicional de orientação objetos
     ficaria assim
     * private Ingrediente $idingrediente;
     * para refencia-lo em uma instancia seria dessa forma:
     * $item->ingrediente->idingrediente.
      
     */
    
    public function __construct() {
        
    }
    public function __get($name) {
        return $this->$name;
    }
    public function __set($name, $value) {
        $this->$name = $value;
    }
}
