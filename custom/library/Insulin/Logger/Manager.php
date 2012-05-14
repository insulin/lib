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

require_once 'include/SugarLogger/LoggerManager.php';

class Insulin_Logger_Manager extends LoggerManager
{
    private static $_instance;
    
    protected static $_loggers;
    protected static $_sugarLoggerManager;

    private function __construct()
    {}

    public static function getLogger()
    {
        if (!isset(self::$_instance)) {
            $c = __CLASS__;
            self::$_instance = new $c();
            self::$_sugarLoggerManager = LoggerManager::getLogger();
            
            // init loggers
            $loggers = LoggerManager::getAvailableLoggers();
            foreach ($loggers as $logger) {
                $loggers[$logger] = null;
            }
            self::$_loggers = $loggers;
        }
        
        return self::$_instance;
    }

    public function __call($method, $message)
    {
        $logger = ucfirst($method) . 'Logger';
        if (array_key_exists($logger, self::$_loggers)) {
            if (is_array($message) && count($message) > 1) {
                $level = array_pop($message);
            } else {
                $level = 'debug';
            }
            if (!isset(self::$_loggers[$logger])) {
                self::$_loggers[$logger] = new $logger();
            }
            
            self::$_loggers[$logger]->log($level, $message);
        } else {
            parent::__call($method, $message);
        }
    }
}
