<?php

namespace CDC\Exemplos;

require "./vendor/autoload.php";

use CDC\Exemplos\ConversorDeNumeroRomano;
use PHPUnit\Framework\TestCase as PHPUnit;

class ConversorDeNumeroRomanoTest extends PHPUnit
{
    public function testeDeveEntenderOSimboloI()
    {
        $romano = new ConversorDeNumeroRomano();
        $numero = $romano->converte("I");
        $this->assertEquals(1, $numero);
    }

    public function testeDeveEntenderOSimboloV()
    {
        $romano = new ConversorDeNumeroRomano();
        $numero = $romano->converte("V");
        $this->assertEquals(5, $numero);
    }

    public function testeDeveEntenderOSimboloII()
    {
        $romano = new ConversorDeNumeroRomano();
        $numero = $romano->converte("II");
        $this->assertEquals(2, $numero);
    }

    public function testeDeveEntenderOSimboloXXXII()
    {
        $romano = new ConversorDeNumeroRomano();
        $numero = $romano->converte("XXXII");
        $this->assertEquals(32, $numero);
    }

    public function testeDeveEntenderOSimboloIX()
    {
        $romano = new ConversorDeNumeroRomano();
        $numero = $romano->converte("IX");
        $this->assertEquals(9, $numero);
    }

    public function testeDeveEntenderOSimboloXXIV()
    {
        $romano = new ConversorDeNumeroRomano();
        $numero = $romano->converte("XXIV");
        $this->assertEquals(24, $numero);
    }

    public function testeDeveEntenderOSimboloCC()
    {
        $romano = new ConversorDeNumeroRomano();
        $numero = $romano->converte("CC");
        $this->assertEquals(200, $numero);
    }

    public function testeDeveEntenderOSimboloMMMMMCMXLVI()
    {
        $romano = new ConversorDeNumeroRomano();
        $numero = $romano->converte("MMMMMCMXLVI");
        $this->assertEquals(5946, $numero);
    }
}
