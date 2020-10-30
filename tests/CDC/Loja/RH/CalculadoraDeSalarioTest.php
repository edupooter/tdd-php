<?php

namespace CDC\Loja\RH;

require "./vendor/autoload.php";

use PHPUnit\Framework\TestCase;

class CalculadoraDeSalarioTest extends TestCase
{
    public function testCalculoSalarioDesenvolvedorSalarioAbaixoLimite()
    {
        $calculadora = new CalculadoraDeSalario();

        $desenvolvedor = new Funcionario("André", 1500.00, TabelaCargos::DESENVOLVEDOR);

        $salario = $calculadora->calculaSalario($desenvolvedor);

        $this->assertEquals(1500.00 * 0.9, $salario, 'Salário incorreto');
    }

    public function testCalculoSalarioDesenvolvedorSalarioAcimaLimite()
    {
        $calculadora = new CalculadoraDeSalario();

        $desenvolvedor = new Funcionario("José", 4000.00, TabelaCargos::DESENVOLVEDOR);

        $salario = $calculadora->calculaSalario($desenvolvedor);

        $this->assertEquals(4000.0 * 0.8, $salario);
    }

    public function testDeveCalcularSalarioParaDBAsComSalarioAbaixoLimite()
    {
        $calculadora = new CalculadoraDeSalario();

        $dba = new Funcionario("Thiago", 500.00, TabelaCargos::DBA);

        $salario = $calculadora->calculaSalario($dba);

        $this->assertEquals(500 * 0.85, $salario);
    }
}
