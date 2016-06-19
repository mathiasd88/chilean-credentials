<?php namespace Mathiasd88\ChileanCredentials\Facades; 

use Illuminate\Support\Facades\Facade;

class Rut extends Facade {

    /**
     * Get the registered name of the component.
     *
     * @return string
     */
    protected static function getFacadeAccessor()
    {
        return 'rut';
    }
}