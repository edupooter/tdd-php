<?php

namespace CDC\Loja\Carrinho;

use PHPUnit\Framework\TestCase;

class MaiorPrecoTest extends TestCase
{
    public function testDeveRetornarZeroSeCarrinhoVazio()
    {
        $carrinho = new CarrinhoDeCompras();

        $algoritmo = new MaiorPreco();

        $valor = $algoritmo->encontra($carrinho);

        $this->assertEquals(0, $valor);
    }
}
