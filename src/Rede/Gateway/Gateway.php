<?php
namespace Rede\Gateway;
use Rede\Gateway\Model\Authetication;
use Rede\Gateway\Model\Card;
use Rede\Gateway\Interfaces\Client;
use Rede\Gateway\Model\Transaction;
use Rede\Gateway\Exceptions\TransactionResult as TransactionResultException; 
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
	 * 
	 * @var TransactionResult
	 */
	private $transactionResult;
	
	/**
	 * 
	 * @param Request $request
	 */
	public function __construct(Request $_request, Client $_client) {
		$this->setRequest($_request);
		$this->setClient($_client);
	}
	
	/**
	 * 
	 */
	public function send() {
		$this->xml_string = "<Request version='2'>";
		$this->xml_string .= $this->getRequest()->getAuth()->getXml();
		$this->xml_string .= $this->getRequest()->getTransaction()->getXml();
		$this->xml_string .= "</Request>";
		$this->getClient()->add($this->xml_string);
		$this->getClient()->send();
		$this->setTransactionResult($this->getClient()->getResponse());
		
		return $this;
	}
	
	/**
	 * 
	 * @return \Rede\Gateway\Request
	 */
	public function getRequest() {
		return $this->_request;
	}

	/**
	 * 
	 * @param unknown $_request
	 * @return \Rede\Gateway\Gateway
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
	 * @param \Rede\Gateway\Client\Client $_client
	 */
	public function setClient($_client) {
		$this->_client = $_client;
	}
	/**
	 * @return the $transactionResult
	 */
	public function getTransactionResult() {
		return $this->transactionResult;
	}

	
	public function setTransactionResult($result) {
		$objResult = simplexml_load_string($result);
		switch ($objResult->status) {
			case 1:
				$this->transactionResult = new TransactionSuccess($objResult);
				break;
			case 25:
			case 21:
			case 13:
				$this->transactionResult = new TransactionError($objResult);
				break;
			default:
				throw new TransactionResultException("Result is not mapped. Code: {$objResult->status}", TransactionResultException::$RESULT_NOT_MAPPED);
		}
		return $this;
	}
	
}