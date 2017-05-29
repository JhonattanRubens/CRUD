<?php
class Connection {
    //DATA SOURCE NAME
    protected $dsn='mysql:dbname=prod; host=localhost', $user='root', $pass='', $con;
    protected $error_con;

    //REALIZANDO FUNCAO DE CONEXAO
    public function Connection(){
        $this->set_con();
    }

    //REALIZANDO FUNCAO DE CONEXAO
    public function set_con(){
        try {
          //SE NÃO HOUVER OBJETO CRIADO, SERA CRIADA A INSTANCIA PARA CONEXAO
            if (is_null($this->con)) {
              $this->con = new PDO($this->dsn, $this->user, $this->pass);
            }
        } catch (Exception $e) {
            echo '<p>Falha ao conectar</p>';
            echo $error_con = $e->getMessage();
        }
    }
    public function get_con(){
      return $this->con;
    }
}
