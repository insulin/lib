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

require_once 'Insulin/Acl/Exception.php';

class Insulin_Acl_NoAccessException extends Insulin_Acl_Exception
{

    public function __construct($moduleName, $accessLevel)
    {
        parent::__construct(array($moduleName, $accessLevel));
    }
}
