<?php

require_once 'Insulin/Auth/Exception.php';

class Insulin_Auth_InvalidSessionException extends Insulin_Auth_Exception
{

    public function __construct($session)
    {
        parent::__construct($session);
    }
}
