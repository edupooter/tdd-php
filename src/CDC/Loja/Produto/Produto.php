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
     *
     * @return string
     */
    public function getNome(): string
    {
        return $this->nome;
    }

    /**
     *  Get the value of valor
     *
     * @return float
     */
    public function getValor(): float
    {
        return $this->valorUnitario;
    }

    /**
     * Get the value of quantidade
     *
     * @return integer
     */
    public function getQuantidade(): int
    {
        return $this->quantidade;
    }

    /**
     * Retorna o valor total do produto
     *
     * @return float
     */
    public function getValorTotal(): float
    {
        return $this->valorUnitario * $this->quantidade;
    }
}
