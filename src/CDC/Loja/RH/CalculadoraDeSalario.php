<?php

namespace CDC\Loja\RH;

class CalculadoraDeSalario
{
    public function calculaSalario(Funcionario $funcionario): float
    {
        if ($funcionario->getSalario() > 3000) {
            return $funcionario->getSalario() * 0.8;
        }
        return $funcionario->getSalario() * 0.9;
    }
}
