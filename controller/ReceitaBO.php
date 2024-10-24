<?php
include_once '../model/Receita.php';
include_once '../model/database/ReceitaDAO.php';

if (isset($_REQUEST['acao'])){

$acao = $_REQUEST['acao'];
    
    switch ($acao) {
        case 'inserir':
            //inserindo um ingrediente
            if (isset($_POST['txtnome']) && 
                !empty($_POST['txtnome'])){
                $dao = new ReceitaDAO();
                $objeto = new Receita();
                $objeto->nome = $_POST['txtnome'];

                if($dao->insert($objeto)){
                    ?>
                    <script type="text/javascript">
                        alert('Receita salva com sucesso.');
                        location.href = '../view/listaingredientes.php';
                    </script>
                    <?php
                }else{
                    ?>
                    <script type="text/javascript">
                        alert('Problema ao salvar receita');
                        history.go(-1);
                    </script>
                    <?php
                }
            }else{
                ?>
                    <script type="text/javascript">
                        alert('Prencha o campo adequadamente.');
                        history.go(-1);
                    </script>
                <?php
            }
            break;
        case 'alterar':
            
            if(isset($_POST['idIngredientes']) && isset($_POST['txtnome']) && !empty($_POST['txtnome'])){
            $dao = new IngredienteDAO();                                         
            $objeto = new Ingrediente();
            $objeto->idIngredientes = $_POST['idIngredientes'];
            $objeto->descricao = $_POST['txtnome'];
            if($dao->update($objeto)){
                        ?>
                    <script type="text/javascript">
                        alert('Ingrediente alterado com sucesso.');
                        location.href = '../view/listaingredientes.php';
                    </script>
                    <?php
                }else{
                    ?>
                    <script type="text/javascript">
                        alert('Problema ao alterar o ingrediente');
                        history.go(-1);
                    </script>
                    <?php
                }  
            
            }else{
                ?>
                    <script type="text/javascript">
                        alert('Prencha o campo adequadamente.');
                        history.go(-1);
                    </script>
                <?php
            }
            break;
        case 'deletar':
             if(isset($_GET['idIngredientes'])){
            $dao = new IngredienteDAO(); 
            $id = $_GET['idIngredientes'];
            if($dao->delete($id)){
                ?>
                    <script type="text/javascript">
                        alert('Ingrediente deletado com sucesso.');
                        location.href = '../view/listaingredientes.php';
                    </script>
                    <?php
                }else{
                    ?>
                    <script type="text/javascript">
                        alert('Problema ao deletar o ingrediente');
                        history.go(-1);
                    </script>
                    <?php
                }  
                
                
            }else{
                ?>
                    <script type="text/javascript">
                        alert('Prencha o campo adequadamente.');
                        history.go(-1);
                    </script>
                <?php
            break;
       
 
            }
    }
}       


?>