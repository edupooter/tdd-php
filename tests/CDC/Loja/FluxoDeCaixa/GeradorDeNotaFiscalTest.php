<?php

namespace CDC\Loja\FluxoDeCaixa;

use CDC\Loja\FluxoDeCaixa\GeradorDeNotaFiscal;
use CDC\Loja\Test\TestCase;
use \Mockery;

class GeradorDeNotaFiscalTest extends TestCase
{
    use \Mockery\Adapter\Phpunit\MockeryPHPUnitIntegration;

    private $dao;
    private $sap;

    public function setup(): void
    {
        $this->dao = Mockery::mock(NFDao::class);
        $this->sap = Mockery::mock(SAP::class);
    }

    public function tearDown(): void
    {
        parent::tearDown();
        Mockery::close();
    }

    public function testDeveGerarNFComValorDeImpostoDescontado()
    {
        // Arrange
        $this->dao->shouldReceive("persiste")->andReturn(true);
        $this->sap->shouldReceive("envia")->andReturn(true);

        // Act
        $gerador = new GeradorDeNotaFiscal($this->dao, $this->sap);
        $pedido = new Pedido("Andre", 1000, 1);
        $nf = $gerador->gera($pedido);

        // Assert
        $this->assertEquals(1000 * 0.94, $nf->getValor(null, 0.00001));
    }

    public function testDevePersistirNFGerada()
    {
        // Arrange
        $this->dao->shouldReceive("persiste")->andReturn(true);
        $this->sap->shouldReceive("envia")->andReturn(true);

        // Act
        $gerador = new GeradorDeNotaFiscal($this->dao, $this->sap);
        $pedido = new Pedido("Andre", 1000, 1);
        $nf = $gerador->gera($pedido);

        // Assert
        $this->assertTrue($this->dao->persiste($nf));
        $this->assertNotNull($nf);
    }

    public function testDeveEnviarNFGeradaParaSAP()
    {
        $this->dao->shouldReceive("persiste")->andReturn(true);
        $this->sap->shouldReceive("envia")->andReturn(true);

        $gerador = new GeradorDeNotaFiscal($this->dao, $this->sap);
        $pedido = new Pedido("Andre", 1000, 1);
        $nf = $gerador->gera($pedido);

        $this->assertTrue($this->sap->envia($nf));
        $this->assertEquals(1000 * 0.94, $nf->getValor(null, 0.00001));
    }
}
