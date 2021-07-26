<?php

namespace Webjump262\DesafioPhpunit\Model;

class Comida {
    private float $preco;
    private string $nome;

    public function __construct(float $preco, string $nome) {
        $this->preco = $preco;
        $this->nome = $nome;
    }

    public function getPreco () : float {
        return $this->preco;
    }

    public function getNome () : string {
        return $this->nome;
    }   

    public function setPreco (float $preco) : void {
        $this->preco = $preco;
    }

    public function setNome (string $nome) : void {
        $this->nome = $nome;
    }

}
