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

require_once 'Insulin/Service/Rest/Exception.php';

class Insulin_Service_Rest_HttpErrorException extends Insulin_Service_Rest_Exception
{

    /**
     *
     * @param int $code
     *   The response code from the HTTP request.
     * @param string $error
     *   Returns a text representation of HTTP response code.
     */
    public function __construct($code, $error)
    {
        parent::__construct(array($code, $error));
    }

}
