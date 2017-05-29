
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
                <h3>CADASTRAR PRODUTOS</h3>
                <label>ID</label>
                <input required type="number" name="form[id]" value="" placeholder="id"><br>
                <label>Nome</label>
                <input required type="text" name="form[nome]" value="" placeholder="nome"><br>
                <label>Valor</label>
                <input required type="text" name="form[valor]" value="" placeholder="valor"><br>
                <label>Tamanho</label>
                <input required type="text" name="form[tamanho]" value="" placeholder="tamanho"><br>
              <input type="submit" name="addProduto" value="Add">
            </form>
        </div>

        <?php
        //PUXANDO DADOS DOS INPUTS DO FORM
        @$formInfo = $_POST['form'];

        //PUXANDO BOTOES SUBMIT
        @$addProduto = $_POST['addProduto'];

        //ESTANCIANDO UM OBJETO DA CLASSE CONTROLLER
        require_once('../../Controller/Controller.php');
        $Control = new Controller;

        //EXECUTANDO FUNCAO DE ADICIONAR PRODUTO
        if ($addProduto){
            $Control->setProdutoModelo($formInfo);
        }

        ?>
        </body>
    </html>
