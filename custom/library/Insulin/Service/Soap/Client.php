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

require_once 'Zend/Soap/Client.php';

class Insulin_Service_Soap_Client
{
    protected $_link = null;
    
    protected $_wsdl = '';
    protected $_soap_version = '';
    protected $_features = '';
    protected $_login = '';
    protected $_password = '';

    public function __construct()
    {
        $this->_initLink();
    }

    protected function _initLink()
    {
        $this->_link = new Zend_Soap_Client(null, $this->getOptions());
    }

    protected function getOptions()
    {
        $options = array();
        
        if (!empty($this->_wsdl)) {
            $options['wsdl'] = $this->_wsdl;
        }
        if (!empty($this->_soap_version)) {
            $options['soap_version'] = $this->_soap_version;
        }
        if (!empty($this->_features)) {
            $options['features'] = $this->_features;
        }
        if (!empty($this->_login)) {
            $options['login'] = $this->_login;
        }
        if (!empty($this->_password)) {
            $options['password'] = $this->_password;
        }
        
        return $options;
    }

    public function getLink()
    {
        return $this->_link;
    }

    public function call($name, array $arguments)
    {
        $link = $this->getLink();
        return $link->$name($arguments);
    }

}
