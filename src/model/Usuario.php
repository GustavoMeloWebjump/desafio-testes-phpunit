<?php

namespace Webjump262\DesafioPhpunit\Model;

class Usuario {
    private string $nome;
    private string $email;
    private string $password;
    private float $credit;

    public function __construct(string $nome, string $email, string $password, float $credit)
    {   
        $this->nome = $nome;
        $this->email = $email;
        $this->password = $password;
        $this->credit = $credit;
    }

    public function getNome () : string {
        return $this->nome;
    }

    public function getEmail () : string {
        return $this->email;
    }

    public function getPassword () : string {
        return $this->password;
    }

    public function getCredit () : float {
        return $this->credit;
    }

    public function setNome (string $nome) : void {
        $this->nome = $nome;
    }

    public function setEmail (string $email) : void {
        $this->email = $email;
    }

    public function setPassword (string $password) : void {
        $this->password = $password;
    }

    public function setCredit (float $credit) : void {
        $this->credit = $credit;
    }
}
