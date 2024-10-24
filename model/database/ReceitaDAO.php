<?php

include_once './DB.php';
class ReceitaDAO {
     public function list($id = null) {
        $where = ($id ? "where idReceita = $id":'');
        $query = "SELECT * FROM receita $where";
        $conn = DB::getInstancia()->query($query);
        $resultado = $conn->fetchAll();
        return $resultado;
    }
    
    public function insert(Receita $obj) {
        $query = "INSERT INTO receita (idReceita, nome) VALUES (null,:nome)";
        $conn = DB::getInstancia()->prepare($query);
        $conn->execute(array(':nome'=>$obj->nome));
        return $conn->rowCount()>0;
    }
    
    public function update(Receita $obj) {
        $query = "UPDATE receita set nome = :pnome "
                . "where idReceita = :idReceita";
        $conn = DB::getInstancia()->prepare($query);
        $conn->execute(array(':pnome'=>$obj->nome,
                      ':pidReceita'=>$obj->idReceita));
        return $conn->rowCount()>0;
    }
    
    public function delete($id) {
        $query = "DELETE from receita where idReceita = :pid";
        $conn = DB::getInstancia()->prepare($query);
        $conn->execute(array(':pid'=>$id));
        return $conn->rowcount()>0;
    }
}


?>