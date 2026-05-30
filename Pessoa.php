<?php

abstract class Pessoa {

    protected $nome;
    protected $cpf;
    protected $idade;

    public function __construct($nome, $cpf, $idade) {
        $this->nome = $nome;
        $this->cpf = $cpf;
        $this->idade = $idade;
    }

    public function getNome() {
        return $this->nome;
    }

    public function getCpf() {
        return $this->cpf;
    }

    public function getIdade() {
        return $this->idade;
    }

    abstract public function exibirDados();
}

?>