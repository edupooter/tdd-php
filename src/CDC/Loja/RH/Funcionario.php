<?php

namespace CDC\Loja\RH;

class Funcionario
{
    protected $nome;
    protected $salario;
    protected $cargo;

    public function __construct($nome, $salario, $cargo)
    {
        $this->nome = $nome;
        $this->salario = $salario;
        $this->cargo = $cargo;
    }

    /**
     * Get the value of nome
     */ 
    public function getNome()
    {
        return $this->nome;
    }

    /**
     * Get the value of salario
     */ 
    public function getSalario()
    {
        return $this->salario;
    }

    /**
     * Get the value of cargo
     */ 
    public function getCargo()
    {
        return $this->cargo;
    }
}
