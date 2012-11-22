<?php

require_once 'custom/library/Insulin/Bootstrap/Abstract.php';

class Insulin_Bootstrap extends Insulin_Bootstrap_Abstract
{

    /**
     * Initializes custom libraries paths.
     */
    protected function _initLibs()
    {
        set_include_path(implode(PATH_SEPARATOR, array(
                    realpath('custom/library/'),
                    get_include_path()
                )));
    }

    /**
     * Initializes Insulin Lib.
     */
    protected function _initInsulinLib()
    {
        global $sugar_config;
        
        require_once 'Insulin/Exception.php';

        global $log;
        require_once 'Insulin/Logger/Manager.php';
        $log = Insulin_Logger_Manager::getLogger();

        // override global timedate of sugar with Insulin one
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
