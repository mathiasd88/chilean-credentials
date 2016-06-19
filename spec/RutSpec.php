<?php

namespace spec\Mathiasd88\ChileanCredentials;

use PhpSpec\ObjectBehavior;
use Prophecy\Argument;

class RutSpec extends ObjectBehavior
{
    function it_is_initializable()
    {
        $this->shouldHaveType('Mathiasd88\ChileanCredentials\Rut');
    }

    function it_returns_true_if_it_is_a_valid_rut()
    {
        $this->validates('16941476-9')->shouldReturn(true);
        $this->validates('16.941.476-9')->shouldReturn(true);
        $this->validates('11190524-k')->shouldReturn(true);
    }

    function it_returns_false_if_it_is_a_invalid_rut()
    {
        $this->validates('16941476-8')->shouldReturn(false);
        $this->validates('16.941.476-8')->shouldReturn(false);
        $this->validates('16941476-K')->shouldReturn(false);
    }

    function it_returns_a_valid_dv()
    {
        $this->getDv('16941476')->shouldReturn(9);
        $this->getDv('11190524')->shouldReturn('K');
    }

    function it_creates_a_random_rut()
    {
        $this->validates($this->createRandom())->shouldReturn(true);
    }


}
