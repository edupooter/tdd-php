<?php

namespace CDC\Loja\Carrinho;

use CDC\Loja\Produto\Produto;
use ArrayObject;

class CarrinhoDeCompras
{
    private $produtos;

    public function __construct()
    {
        $this->produtos = new ArrayObject();
    }

    /**
     * Inclui um Produto no Carrinho e retorna o Carrinho
     *
     * @param Produto $produto
     * @return CarrinhoDeCompras
     */
    public function adiciona(Produto $produto): CarrinhoDeCompras
    {
        $this->produtos->append($produto);

        return $this;
    }

    /**
     * Retorna a lista de Produtos no Carrinho
     *
     * @return ArrayObject
     */
    public function getProdutos(): ArrayObject
    {
        return $this->produtos;
    }

    /**
     * Obtém o maior valor presente no Carrinho
     *
     * @return float
     */
    public function maiorValor(): float
    {
        if (count($this->getProdutos()) === 0) {
            return 0;
        }

        $maiorValor = $this->getProdutos()[0]->getValor();

        foreach ($this->getProdutos() as $produto) {
            if ($maiorValor < $produto->getValor()) {
                $maiorValor = $produto->getValor();
            }
        }

        return $maiorValor;
    }
}
