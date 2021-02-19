<?php

namespace CDC\Loja\Carrinho;

use CDC\Loja\Carrinho\CarrinhoDeCompras;
use CDC\Loja\Produto\Produto;
use PHPUnit\Framework\TestCase;

class CarrinhoDeComprasTest extends TestCase
{
    /**
     * Verifica se o maior preço é zero quando o carrinho está vazio
     *
     * @return void
     */
    public function testDeveRetornarZeroSeCarrinhoVazio(): void
    {
        $carrinho = new CarrinhoDeCompras();

        $valor = $carrinho->maiorValor();

        $this->assertEquals(0, $valor);
    }

    /**
     * Deve Retornar Valor Item se Carrinho Tiver um Elemento
     *
     * @return void
     */
    public function testDeveRetornarValorItemCarrinhoTemUmElemento(): void
    {
        $carrinho = new CarrinhoDeCompras();

        $carrinho->adiciona(new Produto('Geladeira', 1201.45, 1));

        $valor = $carrinho->maiorValor();

        $this->assertEquals(1201.45, $valor);
    }

    /**
     * Retorna o maior valor caso o carrinho tenha muitos itens
     *
     * @return void
     */
    public function testDeveRetornarMaiorValorCarrinhoMuitosElementos(): void
    {
        $carrinho = new CarrinhoDeCompras();

        $carrinho->adiciona(new Produto('Geladeira', 1300, 1));

        $carrinho->adiciona(new Produto('Notebook', 4900, 1));

        $carrinho->adiciona(new Produto('Camiseta', 39.99, 200));

        $valor = $carrinho->maiorValor();

        $this->assertEquals(7998.00, $valor);
    }
}
