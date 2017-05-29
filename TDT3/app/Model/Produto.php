<?php
class Produto {
    private $id, $nome, $valor, $tamanho;

    public function setProduto($formInfo) {
        $this->id = $formInfo['id'];
        $this->nome = $formInfo['nome'];
        $this->tamanho = $formInfo['tamanho'];
        $this->valor = $formInfo['valor'];
    }
    
    function getId() {
        return $this->id;
    }

    function getNome() {
        return $this->nome;
    }

    function getValor() {
        return $this->valor;
    }

    function getTamanho() {
        return $this->tamanho;
    }

}
