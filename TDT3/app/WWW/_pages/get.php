
<html>
    <head>
        <meta charset="UTF-8">
        <title>CoProd</title>
        <link rel="stylesheet" href="../_css/style.css" type="text/css">
        <link rel="stylesheet" href="../_css/form.css" type="text/css">
        <link rel="stylesheet" href="../_css/formOut.css" type="text/css">
        <link rel="stylesheet" href="../_css/text.css" type="text/css">
    </head>
    <body>

        <nav class="menuH">
            <ul>
              <li><a href="#">-</a></li>
            </ul>
        </nav>
        <nav class="menuV">
            <ul>
              <li><a href="#">TDT</a></li>
              <li><a href="add.php">Adicionar Produtos</a></li>
              <li><a href="get.php">Listar Protudos</a></li>
            </ul>
        </nav>

        <div class="content">
            <form class="formIn" action="" method="post">
                <h3>LISTAR</h3>
                <label>FILTRAR POR: </label>
                <select name="filtro">
                    <option value="id">ID</option>
                    <option value="nome">Nome</option>
                    <option value="valor">Preço</option>
                    <option value="tamanho">Tamanho</option>
                </select>
                <input type="submit" name="viewProdutos" value="SHOW">
            </form>
            <?php
            //PUXANDO DADOS DOS INPUTS DO FORM
            @$formInfoUpdate = $_POST['formUpdate'];
            @$id = $_POST['id'];
            @$filter = $_POST['filtro'];

            //PUXANDO BOTOES SUBMIT
            @$viewProdutos = $_POST['viewProdutos'];
            @$editProduto = $_POST['editProduto'];
            @$updateProduto = $_POST['updateProduto'];
            @$cancelUpdateProduto = $_POST['cancelUpdateProduto'];
            @$rmProduto = $_POST['rmProduto'];

            //ESTANCIANDO UM OBJETO DA CLASSE CONTROLLER
            require_once('../../Controller/Controller.php');
            require_once('../../View/View.php');
            $Control = new Controller;


            //EXECUTANDO FUNCAO DE VER PRODUTOS
            if ($viewProdutos) {
                $Control->getProduto($filter);
            }

            //EXECUTANDO FUNCAO DE EDITAR PRODUTO
            if ($editProduto) {
                $Control->editProduto($id);
            }

            //EXECUTANDO FUNCAO DE CANCELAR UPDATE DE PRODUTO
            if ($cancelUpdateProduto) {
                $Control->getProdutos();
            }

            //EXECUTANDO FUNCAO DE ATUALIZAR PRODUTO
            if ($updateProduto) {
                $Control->updateProduto($formInfoUpdate);
            }

            //EXECUTANDO FUNCAO DE REMOVER PRODUTO
            if ($rmProduto) {
                $Control->rmProduto($id);
                $Control->getProdutos();
            }

            ?>
        </div>
    </body>
</html>
