<?php

require_once 'Insulin/Service/Mapping/Exception.php';

class Insulin_Service_Mapping_InvalidArgumentException extends Insulin_Service_Mapping_Exception
{

    public function __construct($value, $argument)
    {
        parent::__construct($value, $argument);
    }

}
