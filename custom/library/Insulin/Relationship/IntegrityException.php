<?php

/*
 * This file is part of the Insulin Lib.
 *
 * (c) Clemente Raposo, Filipe Guerra, João Morais
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 *
 * @license MIT
 *   See LICENSE.txt shipped with this library.
 */

require_once 'Insulin/Relationship/Exception.php';

class Insulin_Relationship_IntegrityException extends Insulin_Relationship_Exception
{

    /**
     * Use this exception when you find a relationship with a number of
     * records different than the ones expected.
     *
     * @param string $relationshipLink
     *   Relationship link name.
     * @param int $relationsCount
     *   Number of related objects found.
     * @param array $relationIds
     *   An array of related objects id's.
     */
    public function __construct($relationshipLink, $relationsCount, array $relationIds)
    {
        parent::__construct(array($relationshipLink, $relationsCount, $relationIds));
    }

}
