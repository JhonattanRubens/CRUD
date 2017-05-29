<?php
require_once ('../../DB/Connection.php');
require_once ('../../DB/Sql.php');
require_once('../../Model/Produto.php');
require_once("../../View/View.php");

class Controller {

    //PEGANDO CONEXAO
    public function Conexao(){
        $c1 = new Connection;
        $conn = $c1->get_con();
        return $conn;
    }

    //PEGANDO OBJETO PRODUTO
    public function Produto(){
        $Produto = new Produto;
        return $Produto;
    }

    //PEGANDO OBJETO VIEW
    public function View(){
        $View = new View();
        return $View;
    }
    
    //PEGANDO OBJETO Sql
    public function Sql(){
        $Sql = new Sql();
        return $Sql;
    }

    //INSERINDO PRODUTOS NO BANCO DE DADOS
    public function setProdutoModelo($formInfo){
        $this->Sql()->add($formInfo);
    }

    //CONSULTANDO PRODUTO PELO ID E ENVIANDO RESULTADO PARA VIEWPRODS
    public function getProduto($filter){
        $verifica=0;
        if ($filter == 'id'){
            $verifica=$this->Conexao()->prepare("SELECT * FROM produto ORDER by id");
        }
        if ($filter == 'nome'){
            $verifica=$this->Conexao()->prepare("SELECT * FROM produto ORDER by nome");
        }
        if ($filter == 'valor'){
            $verifica=$this->Conexao()->prepare("SELECT * FROM produto ORDER by valor");
        }
        if ($filter == 'tamanho'){
            $verifica=$this->Conexao()->prepare("SELECT * FROM produto ORDER by tamanho");
        }
        $verifica->execute();
        $resultVerifica=$verifica->fetchAll(PDO::FETCH_ASSOC);
        $this->View()->ViewProds($resultVerifica);
    }

    public function getProdutos(){
        $verifica=$this->Conexao()->prepare("SELECT * FROM produto");
        $verifica->execute();
        $resultVerifica=$verifica->fetchAll(PDO::FETCH_ASSOC);
        $this->View()->ViewProds($resultVerifica);
    }

    //ALTERANDO PRODUTO PELO ID
    public function editProduto($id){
        $verifica=$this->Conexao()->prepare("SELECT * FROM produto WHERE id = ?");
        $verifica->execute(array($id));
        if ($verifica->rowCount() == 1){
          $resultVerifica=$verifica->fetchAll(PDO::FETCH_ASSOC);
          $this->View()->editProd($resultVerifica);
        }else{
            echo 'NÃO ENCONTRADO';
        }
    }

    //ATUALIZANDO PARA NOVO PRODUTO PELO ID
    public function updateProduto($formInfoUpdate){
        $id = $formInfoUpdate['id'];
        $nome = $formInfoUpdate['nome'];
        $valor = $formInfoUpdate['valor'];
        $tamanho = $formInfoUpdate['tamanho'];
        $update = $this->Conexao()->prepare(
          "UPDATE produto
           SET nome = '$nome', valor = '$valor', tamanho = '$tamanho' WHERE id = '$id'");

        //EXECUTANDO E PASSANDO PARAMETROS via ARRAY / PODE-SE PASSAR COMO O bindValue() TBM
        $verifica = $this->Conexao()->prepare("SELECT * FROM produto WHERE id = $id");
        $verifica->execute();
          if ($verifica->rowCount() >= 1){
            $update->execute();
            $this->getProdutos();
          }else {
              var_dump($formInfoUpdate);
              var_dump($verifica);
            echo "ID {$id} NÃO ENCONTRADO";
          }
    }

    //REMOVENDO PRODUTO PELO ID E ENVIANDO RESULTADO PARA VIEWRM
    public function rmProduto($id){
        $verifica=$this->Conexao()->prepare("SELECT * FROM produto WHERE id = '$id'");
        $verifica->execute();
        if ($verifica->rowCount() == 1){
            $rm=$this->Conexao()->prepare("DELETE FROM produto WHERE id = '$id'");
            $rm->execute();
        }else{
            echo 'NÃO ENCONTRADO';
        }
    }

}
