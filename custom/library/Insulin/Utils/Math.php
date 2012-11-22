<?php

/*
 * This file is part of the Insulin Lib.
 *
 * Copyright (c) 2008-2012 Clemente Raposo, Filipe Guerra, João Morais
 * http://lib.sugarmeetsinsulin.com
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 *
 * @license MIT
 *   See LICENSE shipped with this library.
 */

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
