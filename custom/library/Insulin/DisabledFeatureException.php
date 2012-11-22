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

require_once 'Insulin/Exception.php';

class Insulin_DisabledFeatureException extends Insulin_Exception
{

    /**
     * Constructs the code and message of this Exception based on Insulin
     * Exception.
     *
     * @param type $feature
     *   The feature disabled.
     * @param type $module
     *   The module that should support that feature.
     */
    public function __construct($feature, $module)
    {
        parent::__construct(array($feature, $module));
    }
}
