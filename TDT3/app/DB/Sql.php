<?php
require_once ('Connection.php');
require_once ('../../Model/Produto.php');

class Sql{
    //PEGANDO CONEXAO
    public function Conexao(){
        $c1 = new Connection;
        $conn = $c1->get_con();
        return $conn;
    }
    public function Produto(){
        $Produto = new Produto;
        return $Produto;
    }
    
    public function add($formInfo){
          $id = $formInfo['id'];
          $nome = $formInfo['nome'];
          $valor = $formInfo['valor'];
          $tamanho = $formInfo['tamanho'];
        $insert = $this->Conexao()->prepare("INSERT INTO produto VALUES(:id, :nome, :valor, :tamanho)");
        //VERIFICANCO SE COD NÃO EXISTE NO BANCO
        $verifica = $this->Conexao()->prepare("SELECT * FROM produto WHERE id = :id");
        $verifica->bindValue(":id", "{$id}");
        $verifica->execute();
        if ($verifica->rowCount() == 0){
          echo 'id: '.$id;
          //EXECUTANDO E PASSANDO PARAMETROS via ARRAY / PODE-SE PASSAR COMO O bindValue() TBM
          var_dump($insert->bindValue(':id',"$id"));
          $insert->bindValue(':nome', "$nome");
          $insert->bindValue(':valor', "$valor");
          $insert->bindValue(':tamanho', "$tamanho");
          $insert->execute();
        }else {
            echo 'Já existe';
        }
    }
    
}
