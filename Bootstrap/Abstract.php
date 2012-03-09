<?php

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
