<?php

class Insulin_Utils_Math
{

    /**
     * Rounds fraction down with $decimals support.
     * 
     * @param float $value
     * @param int $decimals
     * @return float
     */
    public static function floordec($value, $decimals = 2)
    {
        return floor($value * pow(10, $decimals)) / pow(10, $decimals);
    }

}
