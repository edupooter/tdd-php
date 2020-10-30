<?php

namespace CDC\Loja\Produto;

class Produto
{
    private $nome;
    private $valorUnitario;
    private $quantidade;

    public function __construct(string $nome, float $valorUnitario, int $quantidade)
    {
        $this->nome = $nome;
        $this->valorUnitario = $valorUnitario;
        $this->quantidade = $quantidade;
    }

    /**
     * Get the value of nome
     */ 
    public function getNome()
    {
        return $this->nome;
    }

    /**
     * Get the value of valor
     */ 
    public function getValor()
    {
        return $this->valorUnitario;
    }

    /**
     * Get the value of quantidade
     */ 
    public function getQuantidade()
    {
        return $this->quantidade;
    }

    public function getValorTotal()
    {
        return $this->valorUnitario * $this->quantidade;
    }
}
