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
        $cargo = new Cargo($funcionario->getCargo());

        return $cargo->getRegra()->calcula($funcionario);
    }
}
