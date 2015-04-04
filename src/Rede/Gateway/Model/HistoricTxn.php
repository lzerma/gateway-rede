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
class HistoricTxn implements Model
{

    /**
     *
     * @var String
     */
    private $_method;

    /**
     *
     * @var String
     */
    private $_reference;

    /**
     *
     */
    public function __construct()
    {

    }

    /**
     * (non-PHPdoc)
     *
     * @see \Rede\Gateway\Interfaces\Model::getXml()
     */
    public function getXml()
    {
        $xml = "<HistoricTxn>
					<method>{$this->getMethod()}</method>
					<reference>{$this->getReference()}</reference>
				</HistoricTxn>";

        return $xml;
    }

    /**
     * @return the $_method
     */
    public function getMethod()
    {
        return $this->_method;
    }

    /**
     * @return the $_reference
     */
    public function getReference()
    {
        return $this->_reference;
    }

    /**
     * @param string $_method
     */
    public function setMethod($_method)
    {
        $this->_method = $_method;
    }

    /**
     * @param string $_reference - Always is the gateway_reference
     */
    public function setReference($_reference)
    {
        $this->_reference = $_reference;
    }
}
