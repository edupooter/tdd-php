<?php

namespace CDC\Loja\FluxoDeCaixa;

use \Mockery;
use CDC\Loja\Test\TestCase;
use CDC\Exemplos\RelogioDoSistema;
use CDC\Loja\FluxoDeCaixa\GeradorDeNotaFiscal;
use CDC\Loja\Tributos\TabelaInterface;

class GeradorDeNotaFiscalTest extends TestCase
{
    use \Mockery\Adapter\Phpunit\MockeryPHPUnitIntegration;

    private $acao1;
    private $acao2;
    private $tabela;

    public function setup(): void
    {
        $this->acao1 = Mockery::mock(AcaoAposGerarNotaInterface::class);
        $this->acao2 = Mockery::mock(AcaoAposGerarNotaInterface::class);
        // mock de uma tabela que ainda não existe
        $this->tabela = Mockery::mock(TabelaInterface::class);
    }

    public function tearDown(): void
    {
        parent::tearDown();
        Mockery::close();
    }

    public function testDeveInvocarAcoesPosteriores()
    {
        // Arrange
        $this->acao1->shouldReceive("executa")->andReturn(true);
        $this->acao2->shouldReceive("executa")->andReturn(true);

        // Act
        $gerador = new GeradorDeNotaFiscal([$this->acao1, $this->acao2], new RelogioDoSistema(), $this->tabela);
        $pedido = new Pedido("Andre", 1000, 1);

        $nf = $gerador->gera($pedido);

        // Assert
        $this->assertTrue($this->acao1->executa($nf));
        $this->assertTrue($this->acao2->executa($nf));
        $this->assertNotNull($nf);
        $this->assertInstanceOf(NotaFiscal::class, $nf);
    }

    public function testDeveConsultarTabelaParaCalcularValor()
    {
        /**
        * define o futuro comportamento "paraValor"
        * que deve retornar 0.2 caso o valor seja 1000.0
        */
        $this->tabela->shouldReceive("paraValor")->with(1000.0)->andReturn(0.2);

        $gerador = new GeradorDeNotaFiscal([], new RelogioDoSistema(), $this->tabela);

        $pedido = new Pedido("André", 1000.0, 1);

        $nf = $gerador->gera($pedido);

        // garante que a tabela foi consultada
        $this->assertEquals(1000 * 0.8, $nf->getValor(null, 0.00001));
    }
}
