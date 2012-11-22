<?php

require_once 'Insulin/Exception.php';

class Insulin_Utils_DateTime_Exception extends Insulin_Exception
{

    /**
     * @param mixed $origDate
     */
    public function __construct($origDate, Exception $previous)
    {
        parent::__construct(array($origDate), $previous);
    }
}
