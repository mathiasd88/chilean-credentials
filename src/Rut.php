<?php namespace Mathiasd88\ChileanCredentials;

class Rut
{
    /**
     * Verifica si un rut es válido o no.
     * 
     * @param  string $rut
     * 
     * @return boolean
     */
    public function validates($rut)
    {
        $rut = $this->format($rut);

        $dv = $this->getDv($rut['run']);

        return ($rut['dv'] == $dv);
    }

    /**
     * Alias for validates method.
     * 
     * @param  string $rut
     * 
     * @return boolean
     */
    public function validate($rut)
    {
        return $this->validates($rut);
    }

    /**
     * Formatea un rut para poder trabajarlo.
     * 
     * @param  string $rut
     * 
     * @return array
     */
    private function format($rut)
    {
        $rut = str_replace(".", "", $rut);

        $rut = explode("-", $rut);

        return [
            'run' => $rut[0],
            'dv' => strtoupper($rut[1])
        ];
    }

    /**
     * Alias del método getDv().
     * 
     * @param  string $run
     * 
     * @return string
     */
    public function dv($run)
    {
        return $this->getDv($run);
    }

    /**
     * Obtiene el dígito verificador para un rut dado.
     * 
     * @param  string $run
     * 
     * @return string
     */
    public function getDv($run)
    {
        $i = 2;
        $suma = 0;

        foreach(array_reverse(str_split($run)) as $v) {
            if ($i == 8) {
                $i = 2;
            }

            $suma += $v * $i;
            ++$i;
        }

        $dv = 11 - ($suma % 11);

        if($dv == 11) $dv = 0;
        if($dv == 10) $dv = 'K';

        return $dv;
    }

    /**
     * Crea un rut aleatorio válido.
     * 
     * @return string
     */
    public function createRandom()
    {
        $numAleatorio = rand(1000000, 25000000);

        $dv = $this->getDv($numAleatorio);

        return $numAleatorio . '-' . $dv;
    }
}
