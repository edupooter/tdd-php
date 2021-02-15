<?php

namespace CDC\Loja\Carrinho;

class MaiorPreco
{
    /**
     * Retorna o Maior Preço existente no Carrinho
     *
     * @param CarrinhoDeCompras $carrinho
     * @return float
     */
    public function encontra(CarrinhoDeCompras $carrinho): float
    {
        if (0 === count($carrinho->getProdutos())) {
            return 0;
        }

        return $carrinho->getProdutos()[0]->getValorTotal();
    }
}
