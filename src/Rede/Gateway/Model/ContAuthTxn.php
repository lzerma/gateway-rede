<?php namespace Rede\Gateway\Model;

use Rede\Gateway\Interfaces\Model;

/**
 *
 * @author  Lucas Zerma - <lzerma@gmail.com>
 * @since   01/04/2014
 * @project www.lucaszerma.com/eredegw
 * @see     https://github.com/lzerma/gateway_rede
 *
 */
class ContAuthTxn implements Model
{

    /**
     *
     * @var String
     */
    private $_caReference = false;

    /**
     *
     * @var String
     */
    private $_accountStatus;


    /**
     *
     */
    public function __construct($result)
    {
        $this->setAccountStatus($result->ContAuthTxn->account_status);
        if (isset($result->ContAuthTxn->ca_reference)) {
            $this->setCaReference($result->ContAuthTxn->ca_reference);
        }
    }

    /**
     * (non-PHPdoc)
     *
     * @see \Rede\Gateway\Interfaces\Model::getXml()
     */
    public function getXml()
    {
    }

    /**
     * @return the $_caReference
     */
    public function getCaReference()
    {
        return $this->_caReference;
    }

    /**
     * @return the $_accountStatus
     */
    public function getAccountStatus()
    {
        return $this->_accountStatus;
    }

    /**
     * @param string $_caReference
     */
    private function setCaReference($_caReference)
    {
        $this->_caReference = (string)$_caReference;
    }

    /**
     * @param string $_accountStatus
     */
    private function setAccountStatus($_accountStatus)
    {
        $this->_accountStatus = (string)$_accountStatus;
    }
}
