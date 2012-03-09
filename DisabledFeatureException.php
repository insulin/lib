<?php

require_once 'Insulin/Exception.php';

class Insulin_DisabledFeatureException extends Insulin_Exception
{

    public function __construct($feature, $module)
    {
        parent::__construct($feature, $module);
    }
}
