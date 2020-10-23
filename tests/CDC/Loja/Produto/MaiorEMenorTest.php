<?php declare(strict_types=1);

namespace CDC\Loja\Produto;

require "./vendor/autoload.php";

use CDC\Loja\Carrinho\CarrinhoDeCompras;
use CDC\Loja\Produto\Produto;
use CDC\Loja\Produto\MaiorEMenor;
use PHPUnit\Framework\TestCase as PHPUnit;

use function PHPUnit\Framework\assertEquals;

class MaiorEMenorTest extends PHPUnit
{
    public function testOrdemDecrescente()
    {
        $carrinho = new CarrinhoDeCompras();

        $carrinho->adiciona(new Produto("Geladeira", 450.00));
        $carrinho->adiciona(new Produto("Liquidificador", 250.00));
        $carrinho->adiciona(new Produto("Jogo de pratos", 70.00));

        $maiorMenor = new MaiorEMenor();

        $maiorMenor->encontra($carrinho);

        $this->assertEquals("Jogo de pratos", $maiorMenor->getMenor()->getNome());
    }

    public function testApenasUmProduto()
    {
        $carrinho = new CarrinhoDeCompras();

        $carrinho->adiciona(new Produto("Geladeira", 450.00));

        $maiorMenor = new MaiorEMenor();

        $maiorMenor->encontra($carrinho);

        $this->assertInstanceOf("CDC\Loja\Produto\Produto", $maiorMenor->getMenor());
    }
}
