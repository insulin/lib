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

require_once 'Insulin/Exception.php';

/**
 * Test if the Insulin Exception works as expected.
 */
class ExceptionTest extends \PHPUnit_Framework_TestCase
{

    public function testCodeAndMessageForString()
    {
        $message = 'This is a simple test message for Insulin Exception.';

        try {
            throw new \Insulin_Exception(array($message));
            $this->fail('Expected exception.');
        } catch (\Insulin_Exception $e) {
            $this->assertEquals($message, $e->getMessage());
            $this->assertEquals('INSULIN_EXCEPTION', $e->getCode());
        }
    }

    public function testCodeAndMessageForArray()
    {
        $fruits = array(
            'fruits' => array('a' => 'orange', 'b' => 'banana', 'c' => 'apple'),
            'numbers' => array(1, 2, 3, 4, 5, 6),
            'holes' => array('first', 5 => 'second', 'third')
        );

        try {
            throw new \Insulin_Exception(array($fruits));
            $this->fail('Expected exception.');
        } catch (\Insulin_Exception $e) {
            $message = var_export($fruits, true);
            $this->assertEquals($message, $e->getMessage());
            $this->assertEquals('INSULIN_EXCEPTION', $e->getCode());
        }
    }

}
