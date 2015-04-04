<?php
namespace Rede\Gateway;

use Rede\Gateway\Model\Authetication;
use Rede\Gateway\Model\Transaction;

/**
 *
 * @author  Lucas Zerma - <lzerma@gmail.com>
 * @since   01/04/2014
 * @project www.lucaszerma.com/eredegw
 * @see     https://github.com/lzerma/gateway_rede
 *
 */
class Request
{

    /**
     *
     * @var Authetication
     */
    private $_auth;

    /**
     *
     * @var Transaction
     */
    private $_transaction = null;

    /**
     *
     */
    public function __construct()
    {
    }

    /**
     *
     * @return \Rede\Gateway\Model\Transaction
     */
    public function getTransaction()
    {
        return $this->_transaction;
    }

    /**
     *
     * @param Transaction $_transaction
     *
     * @return \Rede\Gateway\Request
     */
    public function setTransaction(Transaction $_transaction)
    {
        $this->_transaction = $_transaction;

        return $this;
    }

    /**
     *
     * @return \Rede\Gateway\Model\Authetication
     */
    public function getAuth()
    {
        return $this->_auth;
    }

    /**
     *
     * @param Authetication $_auth
     *
     * @return \Rede\Gateway\Request
     */
    public function setAuth(Authetication $_auth)
    {
        $this->_auth = $_auth;

        return $this;
    }
}
