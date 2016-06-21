<?php

use Mathiasd88\ChileanCredentials\Rut;

class RutTest extends PHPUnit_Framework_TestCase
{
    /** @test */
    public function it_returns_true_if_it_is_a_valid_rut()
    {
        $validRut = '16941476-9';

        $this->assertTrue(Rut::validates($validRut));
    }

    /** @test */
    public function it_returns_false_if_it_is_a_invalid_rut()
    {
        $invalidRut = '16941476-K';

        $this->assertFalse(Rut::validates($invalidRut));
    }

    /** @test */
    public function it_returns_a_valid_dv()
    {
        $rut = '16941476';

        $this->assertEquals('9', Rut::getDv($rut));
    }

    /** @test */
    public function it_creates_a_random_rut()
    {
        $randomRut = Rut::createRandom();

        $this->assertTrue(Rut::validate($randomRut));
    }
}