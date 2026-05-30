<?php

require_once "Pessoa.php";

class Professor extends Pessoa {

    private $funcao;
    private $salario;

    public function __construct($nome, $cpf, $idade, $funcao, $salario) {
        parent::__construct($nome, $cpf, $idade);

        $this->funcao = $funcao;
        $this->salario = $salario;
    }

    public function exibirDados() {
        echo "<h3>Professor</h3>";
        echo "Nome: {$this->nome}<br>";
        echo "CPF: {$this->cpf}<br>";
        echo "Idade: {$this->idade}<br>";
        echo "Função: {$this->funcao}<br>";
        echo "Salário: R$ {$this->salario}<br><hr>";
    }
}

?>