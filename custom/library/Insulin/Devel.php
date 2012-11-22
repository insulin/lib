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

/**
 * Like krumo function, this will serve as an alias to only show debug
 * information for admin users.
 *
 * @see krumo()
 */
function kpr()
{
    global $current_user;

    if ($current_user->isAdmin()) {
        require_once 'Krumo/class.krumo.php';
        $_ = func_get_args();
        return call_user_func_array(array('krumo', 'dump'), $_);
    }
}
