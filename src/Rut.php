<?php namespace Mathiasd88\ChileanCredentials;

class Rut
{
    /**
     * @var int|null|string
     */
    private $run;

    /**
     * @var int|null|string
     */
    private $dv;

    /**
     * Rut constructor.
     * @param null $run
     * @param null $dv
     */
    public function __construct($run = null, $dv = null)
    {
        $this->run = is_null($run) ? $this->random() : $run;
        $this->run = $this->format();

        $this->dv = is_null($dv) ? $this->calculateDv() : $dv;
    }

    /**
     * @return string
     */
    private function format()
    {
        return str_replace(".", "", $this->run);
    }

    /**
     * @return bool
     */
    public function isValid()
    {
        return $this->dv == $this->calculateDv();
    }

    /**
     * @return string
     */
    public function dv()
    {
        return $this->dv;
    }

    /**
     * @return int|string
     */
    private function calculateDv()
    {
        $i = 2;
        $sum = 0;

        foreach(array_reverse(str_split($this->run)) as $v) {
            if ($i == 8) {
                $i = 2;
            }

            $sum += $v * $i;
            ++$i;
        }

        $dv = 11 - ($sum % 11);

        if($dv == 11) $dv = 0;
        if($dv == 10) $dv = 'K';

        return $dv;
    }

    /**
     * @return int
     */
    public function random()
    {
        return rand(1000000, 25000000);
    }

    /**
     * @return string
     */
    public function __toString()
    {
        return $this->run . '-' . $this->dv;
    }
}
