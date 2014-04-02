<?php namespace Rede\Gateway\Model;
use Rede\Gateway\Interfaces\Model;
use Rede\Gateway\Types\Transaction as TransactionTypes;
use Rede\Gateway\Exceptions\Transaction as TransactionException;
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
	 * @var Boleto
	 */
	private $_boleto = null;

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
	 * @var Integer
	 */
	private $_instalments;
	
	/**
	 *
	 * @var String
	 */
	private $_instalments_type;
	
	/**
	 * 
	 */
	public function __construct(Model $txn) {
		if($txn instanceof Card) {
			$this->setCard($txn);
		}
		elseif($txn instanceof Boleto) {
			$this->setBoleto($txn);
		}
		else {
			throw new TransactionException("The param must be a valid model interface, got: ".get_class($txn), TransactionException::$PARAM_NOT_VALID);
		}
	}
	
	/**
	 * (non-PHPdoc)
	 * @see \Rede\Gateway\Interfaces\Model::getXml()
	 */
	public function getXml() {
		$xml = "<Transaction>
					<TxnDetails>
						<merchantreference>{$this->getMerchantreference()}</merchantreference>
						<capturemethod>ecomm</capturemethod>
						<amount currency='BRL'>{$this->getAmount()}</amount>
					</TxnDetails>
					{$this->_getBody()}
					{$this->getInstalments()}
				</Transaction>";
		return $xml;  
	}
	
	/**
	 * 
	 * @throws TransactionException
	 * @return string
	 */
	private function _getBody() {
		if($this->getCard() instanceof Card) {
			return $this->getCard()->getXml();
		}
		
		if($this->getBoleto() instanceof Boleto) {
			return $this->getBoleto()->getXml();
		}
		throw new TransactionException("The transaction need a valid Model.", TransactionException::$MALFORMED_BODY);
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
		if($_amount < 0) {
			throw new TransactionException("The amount of transaction cannot be negative value.", TransactionException::$AMOUNT_ERROR);
		}
		$this->_amount = $_amount;
	}
	/**
	 * @return the $_instalments
	 */
	public function getInstalments() {
		
		if($this->_instalments > 0) {
			if(is_null($this->getInstalments_type())) {
				throw new TransactionException("Interest Bearing not informed.", TransactionException::$NOT_INFORMED_BEARING);
			}
			$xml = "<Instalments>
						<type>{$this->getInstalments_type()}</type>
						<number>{$this->_instalments}</number>
					</Instalments>";
		}
		
		return $xml;
	}

	/**
	 * @param number $_instalments
	 */
	public function setInstalments($_instalments) {
		$this->_instalments = $_instalments;
	}
	/**
	 * @return the $_instalments_type
	 */
	public function getInstalments_type() {
		return $this->_instalments_type;
	}

	/**
	 * @param string $_instalments_type
	 */
	public function setInstalments_type($_instalments_type) {
		switch ($_instalments_type) {
			case TransactionTypes::$INTEREST_BEARING:
			case TransactionTypes::$ZERO_INTEREST:
				$this->_instalments_type = $_instalments_type;
				break;
			default:
				throw new TransactionException("Unknown bearing interest, please verify informed value. Got: {$_instalments_type}.", TransactionException::$UNKNOWN_BEARING);
			break;
		}
	}
	/**
	 * @return the $_boleto
	 */
	public function getBoleto() {
		return $this->_boleto;
	}

	/**
	 * @param \Rede\Gateway\Model\Boleto $_boleto
	 */
	public function setBoleto($_boleto) {
		$this->_boleto = $_boleto;
	}




}