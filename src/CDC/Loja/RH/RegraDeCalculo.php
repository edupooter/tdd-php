<?php

namespace CDC\Loja\RH;

use CDC\Loja\RH\Funcionario;

abstract class RegraDeCalculo
{
    public function calcula(Funcionario $funcionario)
    {
        $salario = $funcionario->getSalario();

        if ($salario > $this->limite()) {
            return $salario * (float) $this->porcentagemAcimaDoLimite();
        }

        return $salario * (float) $this->porcentagemBase();
    }

    protected function limite()
    {
    }

    protected function porcentagemAcimaDoLimite()
    {
    }

    protected function porcentagemBase()
    {
    }
}
