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

require_once 'Insulin/Service/Mapping/Exception.php';

class Insulin_Service_Mapping_InvalidArgumentException extends Insulin_Service_Mapping_Exception
{

    public function __construct($value, $argument)
    {
        parent::__construct(array($value, $argument));
    }

}