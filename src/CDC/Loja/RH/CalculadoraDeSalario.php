<?php

namespace CDC\Loja\RH;

class CalculadoraDeSalario
{
    /**
     * Calcula o salário de um funcionário
     *
     * @param Funcionario $funcionario
     * @return float
     */
    public function calculaSalario(Funcionario $funcionario): float
    {
        if ($funcionario->getCargo() === TabelaCargos::DESENVOLVEDOR) {
            return $this->dezOuVintePorcentoDeDesconto($funcionario);
        } elseif (
            $funcionario->getCargo() === TabelaCargos::DBA
            || $funcionario->getCargo() === TabelaCargos::TESTADOR
        ) {
            return $this->quinzeOuVinteCincoPorcentoDeDesconto($funcionario);
        }

        throw new \Exception('Tipo de funcionário inválido', 1);
    }

    /**
     * Retorna o salário com 10% ou 20% de desconto
     *
     * @param Funcionario $funcionario
     * @return float
     */
    private function dezOuVintePorcentoDeDesconto(Funcionario $funcionario): float
    {
        if ($funcionario->getSalario() > 3000) {
            return $funcionario->getSalario() * 0.8;
        }
        return $funcionario->getSalario() * 0.9;
    }

    /**
     * Retorna o salário com 15% ou 25% de desconto
     *
     * @param Funcionario $funcionario
     * @return float
     */
    private function quinzeOuVinteCincoPorcentoDeDesconto(Funcionario $funcionario): float
    {
        if ($funcionario->getSalario() < 2500.0) {
            return $funcionario->getSalario() * 0.85;
        }
        return $funcionario->getSalario() * 0.75;
    }
}
