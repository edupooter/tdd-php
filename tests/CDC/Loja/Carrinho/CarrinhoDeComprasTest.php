<?php

namespace CDC\Loja\Carrinho;

use CDC\Loja\Carrinho\CarrinhoDeCompras;
use CDC\Loja\Produto\Produto;
use CDC\Loja\Test\Builder\CarrinhoDeComprasBuilder;
use PHPUnit\Framework\TestCase;

class CarrinhoDeComprasTest extends TestCase
{
    /**
     * Carinho de Compras para ser testado
     *
     * @var CarrinhoDeCompras
     */
    private $carrinho;

    protected function setUp(): void
    {
        $this->carrinho = new CarrinhoDeCompras();

        parent::setUp();
    }

    /**
     * Verifica se o maior preço é zero quando o carrinho está vazio
     *
     * @return void
     */
    public function testDeveRetornarZeroSeCarrinhoVazio(): void
    {
        $valor = $this->carrinho->maiorValor();

        $this->assertEquals(0, $valor);
    }

    /**
     * Deve Retornar Valor Item se Carrinho Tiver um Elemento
     *
     * @return void
     */
    public function testDeveRetornarValorItemCarrinhoTemUmElemento(): void
    {
        $this->carrinho->adiciona(new Produto('Geladeira', 1201.45, 1));

        $valor = $this->carrinho->maiorValor();

        $this->assertEquals(1201.45, $valor);
    }

    /**
     * Retorna o maior valor caso o carrinho tenha muitos itens
     *
     * @return void
     */
    public function testDeveRetornarMaiorValorCarrinhoMuitosElementos(): void
    {
        $this->carrinho = (new CarrinhoDeComprasBuilder())
            ->comItens(200, 300.0)
            ->cria();

        $valor = $this->carrinho->maiorValor();

        $this->assertEquals(300.00, $valor);
    }
}
