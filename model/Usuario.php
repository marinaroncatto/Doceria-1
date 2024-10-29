<?php

include_once 'database/DB.php';

class Usuario {
   
    private $idusuario;
    private $login;
    private $senha;
    
    public function __get($name) {
        return $this->$name;
    }
    
    public function __set($name, $value) {
        $this->$name = $value;
    }
    
    public function __construct() {
        
    }
    
    public function autenticaUsuario($login, $senha) {
        $query = "select * from usuario where login = '$login' and senha = password('$senha')";
        $conn = DB::getInstancia()->query($query);
        $resultado = $conn->fetchAll();
        return $resultado === 1;
        
        if(count($resultado)===1){
            return $resultado;
        }else{
            return 0;
        }
    }
    
}

?>