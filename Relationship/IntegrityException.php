<?php

require_once 'Insulin/Relationship/Exception.php';

class Insulin_Relationship_IntegrityException extends Insulin_Relationship_Exception
{

    public function __construct($relationship, $relationsCount, $relationIds)
    {
        parent::__construct($relationship, $relationsCount, $relationIds);
    }

}
