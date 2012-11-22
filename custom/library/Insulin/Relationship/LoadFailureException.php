<?php

require_once 'Insulin/Relationship/Exception.php';

class Insulin_Relationship_LoadFailureException extends Insulin_Relationship_Exception
{

    public function __construct($relationship, $id, $objectName)
    {
        parent::__construct(array($relationship, $id, $objectName));
    }

}
