<?php
class View {

    public function ViewProds($resultVerifica){
        echo "
      <form class=formOut class='' action='' method='post'>
      <input readonly='true' type='text' name='id' value='ID:' placeholder=''>
      <input readonly='true' type='text' name='nome' value='NOME:' placeholder='name'>
      <input readonly='true' type='text' name='valor' value='VALOR:' placeholder='valor'>
      <input readonly='true' type='text' name='tamanho' value='TAMANHO:' placeholder='tamanho'>
      </form>";
        foreach ($resultVerifica as $d) {
          echo "
          <form class=formOut class='' action='' method='post'>
            <input readonly='true' type='text' name='id' value='{$d['id']}' placeholder=''>
            <input readonly='true' type='text' name='nome' value='{$d['nome']}' placeholder='name'>
            <input readonly='true' type='text' name='valor' value='{$d['valor']}' placeholder='valor'>
            <input readonly='true' type='text' name='tamanho' value='{$d['tamanho']}' placeholder='tamanho'>
            <input type='submit' name='editProduto' value='Edit'>
            <input type='submit' name='rmProduto' value='Remover'>
          </form>";
        }
    }

    public function editProd($resultVerifica){
        foreach ($resultVerifica as $d) {
          echo "
                <form class=formIn class='' action='' method='post'>
                  <input readonly type='text' name='formUpdate[id]' value='{$d['id']}' placeholder='{$d['id']}'>
                  <input required type='text' name='formUpdate[nome]' value='{$d['nome']}' placeholder='{$d['nome']}'>
                  <input required type='text' name='formUpdate[valor]' value='{$d['valor']}' placeholder='{$d['valor']}'>
                  <input required type='text' name='formUpdate[tamanho]' value='{$d['tamanho']}' placeholder='{$d['tamanho']}'>
                  <input type='submit' name='updateProduto' value='UPDATE'>
                  <input type='submit' name='cancelUpdateProduto' value='CANCEL'>
                </form>";
        }
    }

}
