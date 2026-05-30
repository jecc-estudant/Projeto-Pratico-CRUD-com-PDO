<?php

require_once "Pessoa.php";

class Visitante extends Pessoa {

    public function __construct($nome, $cpf, $idade) {
        parent::__construct($nome, $cpf, $idade);
    }

    public function exibirDados() {
        echo "<h3>Visitante</h3>";
        echo "Nome: {$this->nome}<br>";
        echo "CPF: {$this->cpf}<br>";
        echo "Idade: {$this->idade}<br>";
        echo "Cadastro realizado apenas para visitas ao <i>Campus</i>.<br><hr>";
    }
}

?>