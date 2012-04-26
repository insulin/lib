<?php

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
