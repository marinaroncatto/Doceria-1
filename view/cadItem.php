<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" href="./favicon.png" type="image/png">
    <title>Doceria Dark Moon</title>
      <?php
    include_once '../model/Login.php';
    Login::verificaSessao();
  ?>
    <link rel="stylesheet" href="../css/estilo.css">
</head>
<body>
    <div class="geral">
        <div class="topo">
            <div class="logo">
                <img src="../img/logo.png" alt="Doceria Dark Moon">
            </div>
            <div class="texto-topo">
                <h1>Doceria Dark Moon</h1>
                <p>Artigos gourmet e doces deliciosos</p>
            </div>
        </div>
        <div class="menu-horizontal">
            <?php
                include_once './menulateral.php';
            ?>
        </div>
        <div class="container">
            <div class="menu-lateral">
                <?php
                  include_once './menu.php';
                ?>
            </div>
            <div class="conteudo">
                <h2>Cadastro de Itens para receita</h2>
                <form action="../controller/ItemBO.php" method="post">
                    <label for="combo">Selecione um ingrediente:</label>
                    <select id="combo" name="combo">
                    <?php
                        include_once '../model/database/IngredienteDAO.php';
                        $dao = new IngredienteDAO();
                        $array = $dao->list();
                        foreach ($array as $value) {
                            
                        
                    ?>                    
                        <option value="<?php echo $value->idingredientes; ?>"><?php echo $value->descricao; ?></option>                                         
                    <?php
                        }
                    ?>
                           </select>
                    <br><br>
                    <label for="texto">Nome do item:</label>
                    <input type="text" id="texto" name="txtnome">
                    <br><br>
                    <label for="data">Data de validade:</label>
                    <input type="date" id="data" name="data">
                    <br><br>
                    <label for="valor">Valor:</label>
                    <input type="number" id="valor" name="valor" placeholder="R$ 0,00">
                    <br><br>
                    <input type="hidden" name="acao" value="inserir">
                    <input type="submit" value="Cadastrar">
                    <input type="reset" value="Limpar">
                </form>
            </div>
        </div>
        <div class="rodape">
            <p>&copy; 2023 Doceria Dark Moon. Todos os direitos reservados.</p>
        </div>
    </div>
</body>
</html>