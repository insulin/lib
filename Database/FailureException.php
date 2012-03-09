<?php

require_once 'Insulin/Database/Exception.php';

class Insulin_Database_FailureException extends Insulin_Database_Exception
{
    protected $_sql;

    public function __construct($sql)
    {
        $this->_sql = $sql;
        parent::__construct();
    }
}
