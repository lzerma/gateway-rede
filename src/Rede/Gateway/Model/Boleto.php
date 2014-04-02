<?php namespace Rede\Gateway\Model;
use Rede\Gateway\Interfaces\Model;
use Rede\Gateway\Types\Boleto as BoletoTypes;
use Rede\Gateway\Exceptions\Boleto as BoletoException;
/**
 * 
 * @author Lucas Zerma - <lzerma@gmail.com>
 * @since 01/04/2014
 * @project www.lucaszerma.com/eredegw
 * @see https://github.com/lzerma/gateway_rede
 *
 */
class Boleto implements Model {

	private $_instructions;

	private $_expiryDate;
	
	private $_customerIp;
	
	private $_firstName;
	
	private $_lastName;
	
	private $_customerEmail;
	
	private $_billingStret1;
	
	private $_processorId;
	
	/**
	 * 
	 */
	public function __construct() {}
	
	/**
	 * (non-PHPdoc)
	 * @see \Rede\Gateway\Interfaces\Model::getXml()
	 */
	public function getXml() {
		$xml = "
				<BoletoTxn>
					<instructions>{$this->getInstructions(true)}</instructions>
					<expiry_date>{$this->getExpiryDate()}</expiry_date>
					<method>payment</method>
					<first_name>{$this->getFirstName()}</first_name>
					<last_name>{$this->getLastName()}</last_name>
					<customer_ip>{$this->getCustomerIp()}</customer_ip>
					<customer_email>{$this->getCustomerEmail()}</customer_email>
					<billing_street1>{$this->getBillingStret1()}</billing_street1>
					<processor_id>{$this->getProcessorId()}</processor_id>
				</BoletoTxn>
				";
		return $xml;  
	}
	
	/**
	 * @return the $_instructions
	 */
	public function getInstructions($utf8) {
		if($utf8) {
			return utf8_encode($this->_instructions);
		}
		else {
			return $this->_instructions;
		}
	}

	/**
	 * @return the $_expiryDate
	 */
	public function getExpiryDate() {
		return $this->_expiryDate;
	}

	/**
	 * @return the $_customerIp
	 */
	public function getCustomerIp() {
		return $this->_customerIp;
	}

	/**
	 * @return the $_firstName
	 */
	public function getFirstName() {
		return $this->_firstName;
	}

	/**
	 * @return the $_lastName
	 */
	public function getLastName() {
		return $this->_lastName;
	}

	/**
	 * @return the $_customerEmail
	 */
	public function getCustomerEmail() {
		return $this->_customerEmail;
	}

	/**
	 * @return the $_billingStret1
	 */
	public function getBillingStret1() {
		return $this->_billingStret1;
	}

	/**
	 * @param field_type $_instructions
	 */
	public function setInstructions($_instructions) {
		$this->_instructions = (string) $_instructions;
	}

	/**
	 * @see Format: YYYY-MM-DD - Example: 2014-12-31
	 * @param unknown $_expiryDate
	 */
	public function setExpiryDate($_expiryDate) {
		$this->_expiryDate = (string) $_expiryDate;
	}

	/**
	 * @param field_type $_customerIp
	 */
	public function setCustomerIp($_customerIp) {
		$this->_customerIp = (string) $_customerIp;
	}

	/**
	 * @param field_type $_firstName
	 */
	public function setFirstName($_firstName) {
		$this->_firstName = (string) $_firstName;
	}

	/**
	 * @param field_type $_lastName
	 */
	public function setLastName($_lastName) {
		$this->_lastName = (string) $_lastName;
	}

	/**
	 * @param field_type $_customerEmail
	 */
	public function setCustomerEmail($_customerEmail) {
		$this->_customerEmail = (string) $_customerEmail;
	}

	/**
	 * @param field_type $_billingStret1
	 */
	public function setBillingStret1($_billingStret1) {
		$this->_billingStret1 = (string) $_billingStret1;
	}
	/**
	 * @return the $_processorId
	 */
	public function getProcessorId() {
		return $this->_processorId;
	}

	/**
	 * @param field_type $_processorId
	 */
	public function setProcessorId($_processorId) {
		switch ($_processorId) {
			case BoletoTypes::$PROCESSOR_BANCOBRASIL:
			case BoletoTypes::$PROCESSOR_BRADESCO:
			case BoletoTypes::$PROCESSOR_CEF:
			case BoletoTypes::$PROCESSOR_HSBC:
			case BoletoTypes::$PROCESSOR_ITAU:
			case BoletoTypes::$PROCESSOR_SANTANDER:
				$this->_processorId = (string) $_processorId;
				break;
			default:
				throw new BoletoException("Unknown processor, verify. Got: {$_processorId}.", BoletoException::$UNKNOWN_PROCESSOR);
		}
	}

}