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

    public function __construct($relationship, $relationsCount, $relationIds)
    {
        parent::__construct(array($relationship, $relationsCount, $relationIds));
    }

}