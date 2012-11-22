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

require_once 'Insulin/Acl/Exception.php';

class Insulin_Acl_NoAccessException extends Insulin_Acl_Exception
{

    /**
     * Use this exception when a user doesn't have enough privileges do access
     * a module's feature.
     *
     * @param string $moduleName
     *   Module name.
     * @param string $accessLevel
     *   Access level, e.g: view, list, delete, edit.
     *
     * @see modules/ACLActions/actiondefs.php
     */
    public function __construct($moduleName, $accessLevel)
    {
        parent::__construct(array($moduleName, $accessLevel));
    }
}
