<?php

namespace CDC\Loja\Produto;

use CDC\Loja\Carrinho\CarrinhoDeCompras;

class MaiorEMenor
{
    private $menor;
    private $maior;

    /**
     * Get the value of menor
     */ 
    public function getMenor()
    {
        return $this->menor;
    }

    /**
     * Get the value of maior
     */ 
    public function getMaior()
    {
        return $this->maior;
    }

    public function encontra(CarrinhoDeCompras $carrinhoDeCompras)
    {
        foreach ($carrinhoDeCompras->getProdutos() as $produto) {
            if (
                empty($this->menor)
                || $produto->getValor() < $this->menor->getValor()
            ) {
                $this->menor = $produto;
            } elseif (
                empty($this->maior)
                || $produto->getValor() > $this->maior->getValor()
            ) {
                $this->menor = $produto;
            }
        }
    }
}
