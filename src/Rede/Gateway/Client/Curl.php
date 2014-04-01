<?php namespace Rede\Gateway\Client;
use Rede\Gateway\Interfaces\Client;
/**
 * 
 * @author Lucas Zerma - <lzerma@gmail.com>
 * @since 01/04/2014
 * @project www.lucaszerma.com/eredegw
 * @see https://github.com/lzerma/gateway_rede
 *
 */
class Curl implements Client {
	
	/**
	 * 
	 * @var resource
	 */
	protected $ch;
	
	/**
	 * 
	 * @var String
	 */
	private $_endpoint = "https://scommerce.userede.com.br/Beta/wsTransaction";
	
	/**
	 * 
	 * @var String
	 */
	private $_response;
	
	/**
	 * 
	 */
	public function __construct() {
		$this->init();
	}
	
	public function init() {
		$this->setCh(curl_init());
		
		curl_setopt($this->getCh(), CURLOPT_URL, $this->getEndpoint());
		curl_setopt($this->getCh(), CURLOPT_POST, 1);
		curl_setopt($this->getCh(), CURLOPT_RETURNTRANSFER, true);
	}
	
	/**
	 * 
	 * @param array $data
	 * @param string $type
	 * @return \Rede\Gateway\Client\Client
	 */
	public function add($data, $type = CURLOPT_POST, $raw = false) {
		$data = ($raw) ? http_build_query($data) : $data;
		switch ($type) {
			case CURLOPT_POST: {
				curl_setopt($this->getCh(), CURLOPT_POSTFIELDS, $data);
			}
		}
		return $this;
	}
	
	/**
	 * 
	 * @return \Rede\Gateway\Client\Client
	 */
	public function send() {
		$this->setResponse(curl_exec ($this->getCh()));
		return $this;		
	}
	
	/**
	 * @return the $ch
	 */
	public function getCh() {
		return $this->ch;
	}

	/**
	 * @param resource $ch
	 */
	public function setCh($ch) {
		$this->ch = $ch;
	}
	/**
	 * @return the $_endpoint
	 */
	public function getEndpoint() {
		return $this->_endpoint;
	}

	/**
	 * @param string $_endpoint
	 */
	public function setEndpoint($_endpoint) {
		$this->_endpoint = $_endpoint;
	}
	/**
	 * @return the $_response
	 */
	public function getResponse() {
		return $this->_response;
	}

	/**
	 * @param string $_response
	 */
	public function setResponse($_response) {
		$this->_response = $_response;
	}
}