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

namespace Insulin\Tests;

require_once 'Insulin/DisabledFeatureException.php';

/**
 * Test if the Insulin Disabled Feature Exception works as expected.
 */
class DisabledFeatureExceptionTest extends \PHPUnit_Framework_TestCase
{

    public function testCodeAndMessageWithTranslation()
    {
        global $app_strings;

        $app_strings['INSULIN_DISABLED_FEATURE_EXCEPTION'] = "Feature '%s' for '%s' disabled.";
        $feature = 'Tests';
        $module = 'Insulin Lib';

        try {
            throw new \Insulin_DisabledFeatureException($feature, $module);
            $this->fail('Expected exception.');
        } catch (\Insulin_Exception $e) {
            $message = vsprintf($app_strings['INSULIN_DISABLED_FEATURE_EXCEPTION'], array($feature, $module));
            $this->assertEquals($message, $e->getMessage());
            $this->assertEquals('INSULIN_DISABLED_FEATURE_EXCEPTION', $e->getCode());
        }

        global $mod_strings;

        $mod_strings['INSULIN_DISABLED_FEATURE_EXCEPTION'] = "Feature '%s' for '%s' is disabled for now. Wait for this feature on a next version.";

        try {
            throw new \Insulin_DisabledFeatureException($feature, $module);
            $this->fail('Expected exception.');
        } catch (\Insulin_Exception $e) {
            $message = vsprintf($mod_strings['INSULIN_DISABLED_FEATURE_EXCEPTION'], array($feature, $module));
            $this->assertEquals($message, $e->getMessage());
            $this->assertEquals('INSULIN_DISABLED_FEATURE_EXCEPTION', $e->getCode());
        }
    }

    public function testCodeAndMessageWithoutTranslation()
    {
        // clean any translations available
        global $app_strings;
        global $mod_strings;

        $app_strings = null;
        $mod_strings = null;

        $feature = 'Tests';
        $module = 'Insulin Lib';

        try {
            throw new \Insulin_DisabledFeatureException($feature, $module);
            $this->fail('Expected exception.');
        } catch (\Insulin_Exception $e) {
            $message = var_export(array($feature, $module), true);
            $this->assertEquals($message, $e->getMessage());
            $this->assertEquals('INSULIN_DISABLED_FEATURE_EXCEPTION', $e->getCode());
        }
    }

}
