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

require_once 'Insulin/Auth/Exception.php';

class Insulin_Auth_InvalidSessionException extends Insulin_Auth_Exception
{

    public function __construct($session)
    {
        parent::__construct(array($session));
    }
}