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
                        location.href = '../view/listareceita.php';
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
            
            if(isset($_POST['idReceita']) && isset($_POST['txtnome']) && !empty($_POST['txtnome'])){
            $dao = new ReceitaDAO();                                         
            $objeto = new Receita();
            $objeto->idReceita = $_POST['idReceita'];
            $objeto->nome = $_POST['txtnome'];
            if($dao->update($objeto)){
                        ?>
                    <script type="text/javascript">
                        alert('Receita alterada com sucesso.');
                        location.href = '../view/listareceita.php';
                    </script>
                    <?php
                        }else{
                    ?>
                    <script type="text/javascript">
                        alert('Problema ao alterar receita');
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
             if(isset($_GET['idReceita'])){
            $dao = new ReceitaDAO(); 
            $id = $_GET['idReceita'];
            if($dao->delete($id)){
                ?>
                    <script type="text/javascript">
                        alert('Receita deletada com sucesso.');
                        location.href = '../view/listareceita.php';
                    </script>
                    <?php
                }else{
                    ?>
                    <script type="text/javascript">
                        alert('Problema ao deletar receita');
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