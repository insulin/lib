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

/**
 * Abstract bootstrap to enable the use of any bootstrap implementation.
 *
 * All _init* methods of the class that implements this will be called
 * automatically with the order that they appear on the code after the run
 * method is invoked.
 */
abstract class Insulin_Bootstrap_Abstract
{
    
    protected $_classResources;

    /**
     * Initializes all resources.
     */
    protected function _init()
    {
        foreach ($this->getClassResources() as $method) {
            $this->$method();
        }
    }

    /**
     * Get class resources (as resource/method pairs)
     *
     * Uses get_class_methods() by default, reflection on prior to 5.2.6,
     * as a bug prevents the usage of get_class_methods() there.
     *
     * @return array
     */
    public function getClassResources()
    {
        if (null === $this->_classResources) {
            if (version_compare(PHP_VERSION, '5.2.6') === -1) {
                $class = new ReflectionObject($this);
                $classMethods = $class->getMethods();
                $methodNames = array();
                
                foreach ($classMethods as $method) {
                    $methodNames[] = $method->getName();
                }
            } else {
                $methodNames = get_class_methods($this);
            }
            
            $this->_classResources = array();
            foreach ($methodNames as $method) {
                if (5 < strlen($method) && '_init' === substr($method, 0, 5)) {
                    $this->_classResources[strtolower(substr($method, 5))] = $method;
                }
            }
        }
        
        return $this->_classResources;
    }

    public function run()
    {
        $this->_init();
    }
}
