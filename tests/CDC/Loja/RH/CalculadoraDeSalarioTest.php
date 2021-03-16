<?php

namespace CDC\Loja\RH;

require "./vendor/autoload.php";

use PHPUnit\Framework\TestCase;

class CalculadoraDeSalarioTest extends TestCase
{
    /**
     * Testa o salário de desenvolvedor abaixo do limite
     *
     * @return void
     */
    public function testCalculoSalarioDesenvolvedorSalarioAbaixoLimite(): void
    {
        $calculadora = new CalculadoraDeSalario();

        $desenvolvedor = new Funcionario("André", 1500.00, TabelaCargos::DESENVOLVEDOR);

        $salario = $calculadora->calculaSalario($desenvolvedor);

        $this->assertEquals(1500.00 * 0.9, $salario, 'Salário incorreto');
    }

    /**
     * Testa o salário de desenvolvedor acima do limite
     *
     * @return void
     */
    public function testCalculoSalarioDesenvolvedorSalarioAcimaLimite(): void
    {
        $calculadora = new CalculadoraDeSalario();

        $desenvolvedor = new Funcionario("José", 4000.00, TabelaCargos::DESENVOLVEDOR);

        $salario = $calculadora->calculaSalario($desenvolvedor);

        $this->assertEquals(4000.0 * 0.8, $salario);
    }

    /**
     * Testa o salário do DBA abaixo do limite
     *
     * @return void
     */
    public function testDeveCalcularSalarioParaDBAsComSalarioAbaixoLimite(): void
    {
        $calculadora = new CalculadoraDeSalario();

        $dba = new Funcionario("Thiago", 500.00, TabelaCargos::DBA);

        $salario = $calculadora->calculaSalario($dba);

        $this->assertEquals(500 * 0.85, $salario);
    }

    /**
     * Testa o salário do DBA acima do limite
     *
     * @return void
     */
    public function testDeveCalcularSalarioParaDBAsComSalarioAcimaLimite(): void
    {
        $calculadora = new CalculadoraDeSalario();

        $dba = new Funcionario('Maurício', 4500.00, TabelaCargos::DBA);

        $salario = $calculadora->calculaSalario($dba);

        $this->assertEquals(4500.00 * 0.75, $salario);
    }
}
