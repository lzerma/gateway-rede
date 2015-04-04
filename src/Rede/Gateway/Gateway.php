<?php
namespace Rede\Gateway;
use Rede\Gateway\Interfaces\Client;
use Rede\Gateway\Interfaces\TransactionResult;
use Rede\Gateway\Model\TransactionSuccess;
use Rede\Gateway\Model\TransactionError;
/**
 * 
 * @author Lucas Zerma - <lzerma@gmail.com>
 * @since 01/04/2014
 * @project www.lucaszerma.com/eredegw
 * @see https://github.com/lzerma/gateway_rede
 *
 */
class Gateway {
	
	/**
	 * 
	 * @var Request
	 */
	private $_request;
	
	/**
	 *
	 * @var Client
	 */
	private $_client;
	
	/**
	 * 
	 * @var String
	 */
	private $xml_string;
	
	/**
	 * @return <TransactionSuccess, TransactionError>
	 */
	private $transactionResult;

    /**
     * @param Request $_request
     * @param Client  $_client
     */
    public function __construct(Request $_request, Client $_client) {
		$this->setRequest($_request);
		$this->setClient($_client);
	}
	
	/**
	 * 
	 * @return TransactionResult
	 */
	public function send() {
		$this->xml_string = "<Request version='2'>";
		$this->xml_string .= $this->getRequest()->getAuth()->getXml();
		$this->xml_string .= $this->getRequest()->getTransaction()->getXml();
		$this->xml_string .= "</Request>";
		$this->getClient()->add($this->xml_string);
		$this->getClient()->send();
		$this->setTransactionResult($this->getClient()->getResponse());
		return $this->getTransactionResult();
	}
	
	/**
	 * 
	 * @return \Rede\Gateway\Request
	 */
	public function getRequest() {
		return $this->_request;
	}

    /**
     * @param Request $_request
     *
     * @return $this
     */
    public function setRequest(Request $_request) {
		$this->_request = $_request;
		return $this;
	}
	
	/**
	 * 
	 * @return \Rede\Gateway\Interfaces\Client
	 */
	public function getClient() {
		return $this->_client;
	}

    /**
     * @param $_client
     */
    public function setClient($_client) {
		$this->_client = $_client;
	}
	
	/**
	 * 
	 * @return Ambigous <\Rede\Gateway\Model\TransactionSuccess, \Rede\Gateway\Model\TransactionError>
	 */
	public function getTransactionResult() {
		return $this->transactionResult;
	}

	/**
	 * 
	 * @param unknown $result
	 * @return \Rede\Gateway\Gateway
	 */
	public function setTransactionResult($result) {
		$objResult = simplexml_load_string($result);
		switch ($objResult->status) {
			case 1:
				$this->transactionResult = new TransactionSuccess($objResult);
				break;
			default:
				$this->transactionResult = new TransactionError($objResult);
				break;
		}
		return $this;
	}
}
