<?php

namespace CDC\Loja\FluxoDeCaixa;

use CDC\Loja\FluxoDeCaixa\GeradorDeNotaFiscal;
use CDC\Loja\Test\TestCase;
use \Mockery;

class GeradorDeNotaFiscalTest extends TestCase
{
    use \Mockery\Adapter\Phpunit\MockeryPHPUnitIntegration;

    private $acao1;
    private $acao2;

    public function setup(): void
    {
        $this->acao1 = Mockery::mock(AcaoAposGerarNotaInterface::class);
        $this->acao2 = Mockery::mock(AcaoAposGerarNotaInterface::class);
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
        $gerador = new GeradorDeNotaFiscal([$this->acao1, $this->acao2]);
        $pedido = new Pedido("Andre", 1000, 1);

        $nf = $gerador->gera($pedido);

        // Assert
        $this->assertTrue($this->acao1->executa($nf));
        $this->assertTrue($this->acao2->executa($nf));
        $this->assertNotNull($nf);
        $this->assertInstanceOf(NotaFiscal::class, $nf);
    }
}
