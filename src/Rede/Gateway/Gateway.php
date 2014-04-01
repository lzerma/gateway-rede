<?php
namespace Rede\Gateway;
use Rede\Gateway\Model\Authetication;
use Rede\Gateway\Model\Card;
use Rede\Gateway\Interfaces\Client;
use Rede\Gateway\Model\Transaction;
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
		return $this->getClient()->getResponse();
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


	
}