<?php

require_once 'Insulin/Acl/Exception.php';

class Insulin_Acl_NoAccessException extends Insulin_Acl_Exception
{

    public function __construct($moduleName, $accessLevel)
    {
        parent::__construct($moduleName, $accessLevel);
    }
}
