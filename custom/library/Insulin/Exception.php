<?php

class Insulin_Exception extends Exception
{

    /**
     * The default Insulin Exception, the mother of all Exceptions.
     *
     * The code of this Exception will be the <EXCEPTION_NAME>. E.g.: the
     * Insulin Exception code will be INSULIN_EXCEPTION.
     * Camelcase Exceptions (like Insulin_ExampleException) will have the code
     * INSULIN_EXAMPLE_EXCEPTION
     *
     * @param array|null $args
     *   (optional) An array of arguments to be printed on the
     *   <EXCEPTION_NAME> string.
     * @param Exception $previous
     *   (optional) The previous exception used for the exception chaining.
     */
    public function __construct(array $args = null, Exception $previous = null)
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
        
        $numArgs = count($args);
        if ($numArgs > 0) {
            
            foreach ($args as $key => $arg) {
                if (is_array($arg)) {
                    $args[$key] = var_export($arg, true);
                }
            }
            
            if (($messageLbl == 'INSULIN_EXCEPTION' && !empty($args[0])) || empty($messageText)) {
                if ($numArgs > 1) {
                    $messageText = var_export($args, true);
                } else {
                    $messageText = $args[0];
                }
            } else {
                $messageText = vsprintf($messageText, $args);
            }
        }
        parent::__construct($messageText, 0, $previous);
        /**
         * @see https://bugs.php.net/bug.php?id=39615
         *   Allowing a non-numeric $code in the Exception constructor seems like the right solution.
         */
        $this->code = $messageLbl;
    }
    
    /**
     * Returns a $message ready for logging.
     * This message contains the exception code, message and stack trace.
     *
     * @return string
     *   The plain text message ready for logging.
     */
     public function getLogMessage(){
         
         $eCode = $this->getCode();
         $eMessage = $this->getMessage();
         
         //Build a pretty print Trace layout
         $eTraceString = $this->getTraceAsString();
         $eTraceArray = explode('#', $eTraceString);
         $eTrace = implode("\t\t#", $eTraceArray);
         
         $message = "\n\tAn Exception was thrown with Code: '$eCode',\n\tMessage: '$eMessage',\n\tStackTrace:\n$eTrace";

         $previous = $this->getPrevious();
         if ($previous && $previous instanceof Insulin_Exception) {
             $message .= $previous->getLogMessage();
         }

         return $message;
     }
}
