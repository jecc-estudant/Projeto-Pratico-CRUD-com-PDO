<?php

require_once "Pessoa.php";

class Estudante extends Pessoa {

    private $curso;

    public function __construct($nome, $cpf, $idade, $curso) {
        parent::__construct($nome, $cpf, $idade);
        $this->curso = $curso;
    }

    public function exibirDados() {
        echo "<h3>Estudante</h3>";
        echo "Nome: {$this->nome}<br>";
        echo "CPF: {$this->cpf}<br>";
        echo "Idade: {$this->idade}<br>";
        echo "Curso: {$this->curso}<br><hr>";
    }
}

?>