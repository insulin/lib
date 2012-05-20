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

require_once 'custom/library/Insulin/Bootstrap/Abstract.php';

/**
 * Insulin bootstrap to initialize many customizations to SugarCRM core code.
 */
class Insulin_Bootstrap extends Insulin_Bootstrap_Abstract
{

    /**
     * Initializes custom libraries paths for easier require_once path.
     */
    protected function _initLibs()
    {
        set_include_path(implode(PATH_SEPARATOR, array(
                    realpath('custom/library/'),
                    get_include_path()
                )));
    }

    /**
     * Initializes Insulin Lib with custom logger manager and custom timedate
     * class.
     */
    protected function _initInsulinLib()
    {
        require_once 'Insulin/Exception.php';

        global $log;
        require_once 'Insulin/Logger/Manager.php';
        $log = Insulin_Logger_Manager::getLogger();

        global $timedate;
        require_once 'Insulin/Utils/DateTime.php';
        $timedate = Insulin_Utils_DateTime::getInstance();
    }

    /**
     * Initializes Insulin Develop module only if we are in developer mode.
     */
    protected function _initDevelFunctions()
    {
        global $sugar_config;

        if (!empty($sugar_config['developerMode'])) {
            require_once 'Insulin/Devel.php';
        }
    }

}
