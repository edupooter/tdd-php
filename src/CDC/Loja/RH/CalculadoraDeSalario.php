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
            if ($funcionario->getSalario() > 3000) {
                return $funcionario->getSalario() * 0.8;
            }
            return $funcionario->getSalario() * 0.9;
        } elseif (
            $funcionario->getCargo() === TabelaCargos::DBA
            || $funcionario->getCargo() === TabelaCargos::TESTADOR
        ) {
            if ($funcionario->getSalario() < 2500.0) {
                return $funcionario->getSalario() * 0.85;
            }
            return $funcionario->getSalario() * 0.75;
        }

        throw new \Exception('Tipo de funcionário inválido', 1);
    }
}
