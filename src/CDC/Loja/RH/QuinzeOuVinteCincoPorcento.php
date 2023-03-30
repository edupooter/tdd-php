<?php

namespace CDC\Loja\RH;

use CDC\Loja\RH\RegraDeCalculo;
use CDC\Loja\RH\Funcionario;

class QuinzeOuVinteCincoPorcento implements RegraDeCalculo
{
    public function calcula(Funcionario $funcionario)
    {
        if ($funcionario->getSalario() < 2500.0) {
            return $funcionario->getSalario() * 0.85;
        }
        return $funcionario->getSalario() * 0.75;
    }
}
