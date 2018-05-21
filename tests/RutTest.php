<?php

use Mathiasd88\ChileanCredentials\Rut;

class RutTest extends PHPUnit_Framework_TestCase
{
    /** @test */
    public function it_returns_true_if_it_is_a_valid_rut()
    {
        $rut = new Rut('16941476', '9');

        $this->assertTrue($rut->isValid());
    }

    /** @test */
    public function it_returns_false_if_it_is_a_invalid_rut()
    {
        $rut = new Rut('16941476', 'k');

        $this->assertFalse($rut->isValid());
    }

    /** @test */
    public function it_returns_a_valid_dv()
    {
        $rut = new Rut('16941476');

        $this->assertEquals('9', $rut->dv());
    }

    /** @test */
    public function it_creates_a_random_rut()
    {
        $randomRut = new Rut();

        $this->assertTrue($randomRut->isValid());
    }
}