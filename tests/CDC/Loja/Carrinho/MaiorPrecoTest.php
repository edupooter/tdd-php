<?php

namespace CDC\Loja\Carrinho;

use PHPUnit\Framework\TestCase;

class MaiorPrecoTest extends TestCase
{
    /**
     * Verifica se o maior preço é zero quando o carrinho está vazio
     *
     * @return void
     */
    public function testDeveRetornarZeroSeCarrinhoVazio(): void
    {
        $carrinho = new CarrinhoDeCompras();

        $algoritmo = new MaiorPreco();

        $valor = $algoritmo->encontra($carrinho);

        $this->assertEquals(0, $valor);
    }

    /**
     * Deve Retornar Valor Item se Carrinho Tiver um Elemento
     *
     * @return void
     */
    public function testDeveRetornarValorItemCarrinhoTemUmElemento(): void
    {
        # code...
    }
}
