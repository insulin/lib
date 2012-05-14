<?php
/*
 * This file is part of the Insulin Lib.
 *
 * (c) Clemente Raposo, Filipe Guerra, João Morais
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 *
 * @license MIT
 *   See LICENSE.txt shipped with this library.
 */

require_once 'Insulin/Exception.php';

class Insulin_Utils_DateTime_Exception extends Insulin_Exception
{

    /**
     * @param mixed $origDate
     */
    public function __construct($origDate, Exception $previous)
    {
        parent::__construct(array($origDate), $previous);
    }
}
