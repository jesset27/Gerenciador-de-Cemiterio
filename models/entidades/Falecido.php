<?php
class Falecido {
    private string $nome;
    private string $cpf;
    private string $data_morte;

    public function __construct($nome, $cpf, $data_morte) {
        $this->nome = $nome;
        $this->cpf = $cpf;
        $this->data_morte = $data_morte;
    }

    public function getNome() {
        return $this->nome;
    }

    public function setNome($nome) {
        $this->nome = $nome;
    }

    public function getCpf() {
        return $this->cpf;
    }

    public function setCpf($cpf) {
        $this->cpf = $cpf;
    }

    public function getDataMorte() {
        return $this->data_morte;
    }

    public function setDataMorte($data_morte) {
        $this->data_morte = $data_morte;
    }
}
