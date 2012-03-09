<?php

require_once 'Zend/Http/Client.php';
require_once 'Insulin/Auth/AutenticationFailedException.php';

class Insulin_Service_Rest_Client
{
    const GET = Zend_Http_Client::GET;
    const POST = Zend_Http_Client::POST;
    const PUT = Zend_Http_Client::PUT;
    const DELETE = Zend_Http_Client::DELETE;
    
    protected $_link = null;
    protected $_endpoint = '';

    public function __construct()
    {
        $this->_initLink();
    }

    protected function _initLink()
    {
        $this->_link = new Zend_Http_Client($this->_endpoint);
    }

    public function getLink()
    {
        return $this->_link;
    }
    
    public function doRequest($name, array $arguments, $method)
    {
         $link = $this->getLink();
         $link->setUri($this->_endpoint.$name);
         $link->setMethod($method);
         $response = $link->request();
         return $response;
    }
    
    public function doPost($name, array $arguments = array())
    {
        if (!empty($arguments)) {
            $link = $this->getLink();
            $link->setParameterPost($arguments);
        }
        $response = $this->doRequest($name, $arguments, self::POST);
        return $response->getBody();
    }
    
    public function doGet($name, array $arguments = array())
    {
        if (!empty($arguments)) {
            $link = $this->getLink();
            $link->setParameterGet($arguments);
        }
        $response = $this->doRequest($name, $arguments, self::GET);
        return $response->getBody();
    }
    
    public function doPut($name, array $arguments = array())
    {
        if (!empty($arguments)) {
            $link = $this->getLink();
            $link->setParameterPost($arguments);
        }
        $response = $this->doRequest($name, $arguments, self::PUT);
        return $response->getBody();
    }
    
}
