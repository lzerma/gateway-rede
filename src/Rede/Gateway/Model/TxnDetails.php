<?php namespace Rede\Gateway\Model;
use Rede\Gateway\Exceptions\Transaction as TransactionException;
use Rede\Gateway\Interfaces\Model;
use Rede\Gateway\Types\Instalments;
use Rede\Gateway\Types\TxnDetails as TxnDetailsTypes;
/**
 * 
 * @author Lucas Zerma - <lzerma@gmail.com>
 * @since 01/04/2014
 * @project www.lucaszerma.com/eredegw
 * @see https://github.com/lzerma/gateway_rede
 *
 */
class TxnDetails implements Model {

	/**
	 *
	 * @var Integer
	 */
	private $_merchantreference;
	
	/**
	 *
	 * @var String
	 */
	private $_captureMethod;
	
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
	public function __construct() {
		$this->setCaptureMethod(TxnDetailsTypes::$CAPTURE_METHOD_ECOMM);
	}
	
	/**
	 * (non-PHPdoc)
	 * @see \Rede\Gateway\Interfaces\Model::getXml()
	 */
	public function getXml() {
		$xml = "<TxnDetails>
					<merchantreference>{$this->getMerchantreference()}</merchantreference>
					<capturemethod>{$this->getCaptureMethod()}</capturemethod>
					<amount currency='BRL'>{$this->getAmount()}</amount>
					{$this->getInstalments()}
				</TxnDetails>";
		return $xml;
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
	 * @param number $_merchantreference
	 */
	public function setMerchantreference($_merchantreference) {
		$this->_merchantreference = $_merchantreference;
	}

    /**
     * @param $_amount
     *
     * @throws \Rede\Gateway\Exceptions\Transaction
     */
    public function setAmount($_amount) {
		if($_amount < 0) {
			throw new TransactionException("The amount of transaction cannot be negative value.", TransactionException::$AMOUNT_ERROR);
		}
		$this->_amount = $_amount;
	}

    /**
     * @return string
     * @throws \Rede\Gateway\Exceptions\Transaction
     */
    public function getInstalments() {
		$xml = "";
		if($this->_instalments > 0 && $this->_captureMethod != 'cont_auth') {
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
     * @param $_instalments_type
     *
     * @throws \Rede\Gateway\Exceptions\Transaction
     */
    public function setInstalments_type($_instalments_type) {
		switch ($_instalments_type) {
			case Instalments::$INTEREST_BEARING:
			case Instalments::$ZERO_INTEREST:
				$this->_instalments_type = $_instalments_type;
				break;
			default:
				throw new TransactionException("Unknown bearing interest, please verify informed value. Got: {$_instalments_type}.", TransactionException::$UNKNOWN_BEARING);
				break;
		}
	}
	
	/**
	 * @return the $_captureMethod
	 */
	public function getCaptureMethod() {
		return $this->_captureMethod;
	}

	/**
	 * @param string $_captureMethod
	 */
	public function setCaptureMethod($_captureMethod) {
		$this->_captureMethod = $_captureMethod;
	}

}