<?php namespace Rede\Gateway\Model;
use Rede\Gateway\Interfaces\Model;
/**
 * 
 * @author Lucas Zerma - <lzerma@gmail.com>
 * @since 01/04/2014
 * @project www.lucaszerma.com/eredegw
 * @see https://github.com/lzerma/gateway_rede
 *
 */
class Transaction implements Model {

	/**
	 * 
	 * @var Card
	 */
	private $_card = null;

	/**
	 * 
	 * @var Integer
	 */
	private $_merchantreference;
	
	/**
	 * 
	 * @var Float
	 */
	private $_amount;
	
	/**
	 * 
	 */
	public function __construct($card) {
		$this->setCard($card);
	}
	
	/**
	 * 
	 * @return string
	 */
	public function getXml() {
		$xml = "<Transaction>
					<TxnDetails>
						<merchantreference>{$this->getMerchantreference()}</merchantreference>
						<capturemethod>ecomm</capturemethod>
						<amount currency='BRL'>{$this->getAmount()}</amount>
					</TxnDetails>
					{$this->getCard()->getXml()}
				</Transaction>";
		return $xml;  
	}
	
	/**
	 * 
	 * @return \Rede\Gateway\Model\Card
	 */
	public function getCard() {
		return $this->_card;
	}

	/**
	 * @return the $_merchantreference
	 */
	public function getMerchantreference() {
		return $this->_merchantreference;
	}

	/**
	 * @return the $_amount
	 */
	public function getAmount() {
		return $this->_amount;
	}

	/**
	 * @param \Rede\Gateway\Model\Card $_card
	 */
	public function setCard($_card) {
		$this->_card = $_card;
	}

	/**
	 * @param number $_merchantreference
	 */
	public function setMerchantreference($_merchantreference) {
		$this->_merchantreference = $_merchantreference;
	}

	/**
	 * @param number $_amount
	 */
	public function setAmount($_amount) {
		$this->_amount = $_amount;
	}

}