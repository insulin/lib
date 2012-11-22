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

require_once 'Insulin/Database/Exception.php';

class Insulin_Database_FailureException extends Insulin_Database_Exception
{
    protected $_sql;

    public function __construct($sql)
    {
        $this->_sql = $sql;
        parent::__construct();
    }
}
