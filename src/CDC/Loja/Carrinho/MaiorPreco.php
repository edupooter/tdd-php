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

        $maiorValor = $carrinho->getProdutos()[0]->getValorTotal();

        foreach ($carrinho->getProdutos() as $produto) {
            if ($maiorValor < $produto->getValorTotal()) {
                $maiorValor = $produto->getValorTotal();
            }
        }

        return $maiorValor;
    }
}
