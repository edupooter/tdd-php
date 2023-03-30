<?php

namespace CDC\Exemplos;

use CDC\Exemplos\Calculadora;
use CDC\Loja\Test\TestCase;

class CalculadoraTest extends TestCase
{
    public function testDeveSomarDoisNumerosPositivos()
    {
        $this->assertEquals(0.30000000000000004, (new Calculadora())->somar(0.1, 0.2));
    }

    public function testDeveSomarPositivoComNegativo()
    {
        $this->assertEquals(4, (new Calculadora())->somar(6, -2));
    }

    public function testDeveSomarNegativoComPositivo()
    {
        $this->assertEquals(-4, (new Calculadora())->somar(-6, 2));
    }

    public function testDeveSomarComZero()
    {
        $this->assertEquals(4, (new Calculadora())->somar(4, 0));

        $this->assertEquals(4, (new Calculadora())->somar(0, 4));
    }
}
