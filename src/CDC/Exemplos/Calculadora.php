<?php

namespace CDC\Exemplos;

class Calculadora
{
    /**
     * Soma dois números do conjunto de números reais
     *
     * @param float $numeroA
     * @param float $numeroB
     * @return float
     */
    public function somar(float $numeroA, float $numeroB): float
    {
        return $numeroA + $numeroB;
    }
}
