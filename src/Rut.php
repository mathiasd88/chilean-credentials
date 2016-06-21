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
    public static function validates($rut)
    {
        $rut = self::format($rut);

        $dv = self::getDv($rut['run']);

        return ($rut['dv'] == $dv);
    }

    /**
     * Alias for validates method.
     * 
     * @param  string $rut
     * 
     * @return boolean
     */
    public static function validate($rut)
    {
        return self::validates($rut);
    }

    /**
     * Formatea un rut para poder trabajarlo.
     * 
     * @param  string $rut
     * 
     * @return array
     */
    private static function format($rut)
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
    public static function dv($run)
    {
        return self::getDv($run);
    }

    /**
     * Obtiene el dígito verificador para un rut dado.
     * 
     * @param  string $run
     * 
     * @return string
     */
    public static function getDv($run)
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
    public static function createRandom()
    {
        $numAleatorio = rand(1000000, 25000000);

        $dv = self::getDv($numAleatorio);

        return $numAleatorio . '-' . $dv;
    }
}
