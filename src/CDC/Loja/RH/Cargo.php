<?php

namespace CDC\Loja\RH;

class Cargo
{
    private $cargos = [
        "desenvolvedor" => "CDC\Loja\RH\DezOuVintePorcento",
        "dba" => "CDC\Loja\RH\QuinzeOuVinteCincoPorcento",
        "testador" => "CDC\Loja\RH\QuinzeOuVinteCincoPorcento",
    ];

    private $regra;

    public function __construct($regra)
    {
        if (array_key_exists($regra, $this->cargos)) {
            $this->regra = $this->cargos[$regra];
        } else {
            throw new \Exception("Cargo inválido", 1);
        }
    }

    public function getRegra()
    {
        return new $this->regra;
    }
}
