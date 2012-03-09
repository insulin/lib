<?php

class Insulin_Exception extends Exception
{

    /**
     * Class constructor.
     */
    public function __construct()
    {
        global $sugar_config;
        global $app_list_strings;
        global $app_strings;
        global $mod_strings;
        global $current_language;
        
        if (is_null($current_language)) {
            $current_language = $sugar_config['default_language'];
        }
        
        if (is_null($app_list_strings)) {
            $app_list_strings = return_app_list_strings_language($current_language);
        }
        if (is_null($app_strings)) {
            $app_strings = return_application_language($current_language);
        }
        
        $messageLbl = get_class($this);
        $messageLbl = strtoupper(preg_replace('/(?<=[a-z0-9])([A-Z])/', '_$1', $messageLbl));
        
        if (!empty($messageLbl) && isset($mod_strings) && isset($mod_strings[$messageLbl])) {
            $messageText = $mod_strings[$messageLbl];
        
        } else if (!empty($messageLbl) && isset($app_strings[$messageLbl])) {
            $messageText = $app_strings[$messageLbl];
        
        } else {
            $messageText = '';
        }
        
        $numArgs = func_num_args();
        if ($numArgs > 0) {
            $args = func_get_args();
            
            foreach ($args as $key => $arg) {
                if (is_array($arg)) {
                    $args[$key] = var_export($arg, true);
                }
            }
            
            if (($messageLbl == 'INSULIN_EXCEPTION' && !empty($args['0'])) || empty($messageText)) {
                if ($numArgs > 1) {
                    $messageText = var_export($args, true);
                } else {
                    $messageText = $args[0];
                }
            } else {
                $messageText = vsprintf($messageText, $args);
            }
        }
        parent::__construct($messageText);
        $this->code = $messageLbl;
    }
}
