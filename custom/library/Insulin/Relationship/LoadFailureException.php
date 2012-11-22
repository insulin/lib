<?php

/*
 * This file is part of the Insulin Lib.
 *
 * Copyright (c) 2008-2012 Clemente Raposo, Filipe Guerra, João Morais
 * http://lib.sugarmeetsinsulin.com
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 *
 * @license MIT
 *   See LICENSE shipped with this library.
 */

require_once 'Insulin/Relationship/Exception.php';

class Insulin_Relationship_LoadFailureException extends Insulin_Relationship_Exception
{

    /**
     * Use this exception when you fail to load a relationship with success.
     *
     * @param string $relationshipLink
     *   Relationship link name.
     * @param string $id
     *   SugarBean id.
     * @param string $objectName
     *   SugarBean object name.
     */
    public function __construct($relationshipLink, $id, $objectName)
    {
        parent::__construct(array($relationshipLink, $id, $objectName));
    }

}
