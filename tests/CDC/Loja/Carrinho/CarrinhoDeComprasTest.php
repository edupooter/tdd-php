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
        $produto = new Produto('Geladeira', 1201.45, 1);

        $this->carrinho->adiciona($produto);

        $valor = $this->carrinho->maiorValor();

        $this->assertEquals(1201.45, $valor);
    }

    /**
     * Compara produtos criados
     *
     * @return void
     */
    public function testComparaProdutosCriados(): void
    {
        $produto = new Produto('Geladeira', 1201.45, 1);

        // Alternativa 1
        $this->assertEquals('Geladeira', $produto->getNome());
        $this->assertEquals(1201.45, $produto->getValor());
        $this->assertEquals(1, $produto->getQuantidade());
        $this->assertEquals(1201.45, $produto->getValorTotal());

        // Alternativa 2
        $itemEsperado =  new Produto('Geladeira', 1201.45, 1);

        $this->assertEquals($itemEsperado, $produto);
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

    /**
     * Verifica se um produto foi guardado no carrinho
     *
     * @return void
     */
    public function testDeveAdicionarItens(): void
    {
        // Garante que o carrinho esteja vazio
        $this->assertEmpty($this->carrinho->getProdutos());

        $produto =  new Produto('Geladeira', 1201.45, 1);

        $this->carrinho->adiciona($produto);

        // Verifica quantos produtos há no carrinho
        $quantidadeEsperada = count($this->carrinho->getProdutos());

        // Espera que haja apenas um produto no carrinho
        $this->assertEquals(1, $quantidadeEsperada);

        // Verifica se o produto esperado corresponde ao adicionado
        $this->assertEquals($produto, $this->carrinho->getProdutos()[0]);
    }

    /**
     * Valida o conteúdo dos objetos adicionados no carrinho
     *
     * @return void
     */
    public function testListaDeProdutos(): void
    {
        $lista = (new CarrinhoDeCompras())
            ->adiciona(new Produto('Jogo de Jantar', 200.00, 1))
            ->adiciona(new Produto('Jogo de Pratos', 100.00, 1));

        $this->assertEquals(2, count($lista->getProdutos()));

        $this->assertEquals(200.00, $lista->getProdutos()[0]->getValor());

        $this->assertEquals(100.00, $lista->getProdutos()[1]->getValor());
    }
}
