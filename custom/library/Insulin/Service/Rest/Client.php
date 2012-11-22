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

require_once 'Zend/Http/Client.php';

abstract class Insulin_Service_Rest_Client
{

    /**
     * HTTP request methods
     */
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

    /**
     * Make a HTTP request.
     * @param string $method
     * @param array $getParameters
     * @param array $postParameters
     * @throws Insulin_Service_Rest_ConnectionFailedException
     * @throws Insulin_Service_Rest_HttpErrorException
     */
    protected function _doRequest($method, array $getParameters = null, array $postParameters = null)
    {
        $link = $this->getLink();

        if (!empty($postParameters)) {
            $link->setParameterPost($postParameters);
        }
        if (!empty($getParameters)) {
            $link->setParameterGet($getParameters);
        }

        $link->setUri($this->_endpoint);
        $link->setMethod($method);

        require_once 'Zend/Http/Exception.php';
        try {
            $response = $link->request();
        } catch (Zend_Http_Exception $e) {
            require_once 'Insulin/Service/Rest/ConnectionFailedException.php';
            throw new Insulin_Service_Rest_ConnectionFailedException();
        }

        if ($response->isError()) {
            require_once 'Insulin/Service/Rest/HttpErrorException.php';
            // extract error code from response
            $code = Zend_Http_Response::extractCode($response);
            // extract standard error message from response
            $msg = Zend_Http_Response::responseCodeAsText($code);
            throw new Insulin_Service_Rest_HttpErrorException($code, $msg);
        }

        return $response;
    }

    /**
     * Makes a POST REST request.
     *
     * @param array $postParameters
     * @param array $getParameters
     */
    public function post(array $postParameters, array $getParameters = null)
    {
        $response = $this->_doRequest(self::POST, $getParameters, $postParameters);
        return $response->getBody();
    }

    /**
     * Makes a GET REST request.
     * 
     * @param array $getParameters
     */
    public function get(array $getParameters = null)
    {
        $response = $this->_doRequest(self::GET, $getParameters, null);
        return $response->getBody();
    }

    /**
     * Makes a PUT REST request.
     *
     * @param array $putParameters
     * @param array $getParameters
     */
    public function put(array $putParameters, array $getParameters = null)
    {
        $response = $this->_doRequest(self::PUT, $getParameters, $putParameters);
        return $response->getBody();
    }

    /**
     * Makes a DELETE REST request.
     *
     * @param array $deleteParameters
     * @param array $getParameters
     */
    public function delete(array $deleteParameters, array $getParameters = null)
    {
        $response = $this->_doRequest(self::DELETE, $getParameters, $deleteParameters);
        return $response->getBody();
    }

}
