<?php

namespace CDC\Loja\Test\Builder;

use CDC\Loja\Carrinho\CarrinhoDeCompras;
use CDC\Loja\Produto\Produto;

class CarrinhoDeComprasBuilder
{
    /**
     * Carrinho de Compras
     *
     * @var CarrinhoDeCompras
     */
    public $carrinho;

    /**
     * Método construtor
     */
    public function __construct()
    {
        $this->carrinho = new CarrinhoDeCompras();
    }

    /**
     * Adiciona itens no Carrinho
     *
     * @return CarrinhoDeComprasBuilder
     */
    public function comItens(): CarrinhoDeComprasBuilder
    {
        $valores = func_get_args();

        foreach ($valores as $i => $valor) {
            $this->carrinho->adiciona(new Produto("Item - {$i}", $valor, 1));
        }

        return $this;
    }

    /**
     * Cria um carrinho
     *
     * @return CarrinhoDeCompras
     */
    public function cria(): CarrinhoDeCompras
    {
        return $this->carrinho;
    }
}
