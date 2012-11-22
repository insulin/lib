<?php

require_once 'Insulin/Service/Mapping/Exception.php';

class Insulin_Service_Mapping_RequiredArgumentNotFoundException extends Insulin_Service_Mapping_Exception
{

    public function __construct($argument)
    {
        parent::__construct(array($argument));
    }

}
