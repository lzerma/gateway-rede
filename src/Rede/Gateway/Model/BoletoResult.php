<?php namespace Rede\Gateway\Model;

/**
 * 
 * @author Lucas Zerma - <lzerma@gmail.com>
 * @since 01/04/2014
 * @project www.lucaszerma.com/eredegw
 * @see https://github.com/lzerma/gateway_rede
 *
 */
class BoletoResult extends Boleto {
	
	/**
	 * 
	 * @var unknown
	 */
	private $_amount;
	
	/**
	 * 
	 * @var unknown
	 */
	private $_barcodeNumber;
	
	/**
	 * 
	 * @var unknown
	 */
	private $_boletoNumber;
	
	/**
	 * 
	 * @var unknown
	 */
	private $_boletoUrl;
	
	/**
	 * 
	 * @var unknown
	 */
	private $_merchantId;
	
	/**
	 * 
	 * @var unknown
	 */
	private $_orderId;
	
	/**
	 * 
	 * @var unknown
	 */
	private $_paymentStatus;
	
	/**
	 * 
	 * @var unknown
	 */
	private $_transactionId;
	
	/**
	 * 
	 * @param SimpleXMLElement $result
	 */
	public function __construct($result) {
		$this->setAmount($result->amount);
		$this->setBarcodeNumber($result->barcode_number);
		$this->setBillingStret1($result->billing_street1);
		$this->setBoletoNumber($result->boleto_number);
		$this->setBoletoUrl($result->boleto_url);
		$this->setCustomerEmail($result->customer_email);
		$this->setCustomerIp($result->customer_ip);
		$this->setExpiryDate($result->expiry_date);
		$this->setFirstName($result->first_name);
		$this->setLastName($result->last_name);
		$this->setInstructions($result->instructions);
		$this->setMerchantId($result->merchant_id);
		$this->setOrderId($result->order_id);
		$this->setPaymentStatus($result->payment_status);
		$this->setProcessorId($result->processor_id);
		$this->setTransactionId($result->transaction_id);
	}
	
	/**
	 * @return the $_amount
	 */
	public function getAmount() {
		return $this->_amount;
	}

	/**
	 * @return the $_barcodeNumber
	 */
	public function getBarcodeNumber() {
		return $this->_barcodeNumber;
	}

	/**
	 * @return the $_boletoNumber
	 */
	public function getBoletoNumber() {
		return $this->_boletoNumber;
	}

	/**
	 * @return the $_merchantId
	 */
	public function getMerchantId() {
		return $this->_merchantId;
	}

	/**
	 * @return the $_orderId
	 */
	public function getOrderId() {
		return $this->_orderId;
	}

	/**
	 * @return the $_paymentStatus
	 */
	public function getPaymentStatus() {
		return $this->_paymentStatus;
	}

	/**
	 * @return the $_transactionId
	 */
	public function getTransactionId() {
		return $this->_transactionId;
	}

	/**
	 * @param \Rede\Gateway\Model\unknown $_amount
	 */
	public function setAmount($_amount) {
		$this->_amount = (string) $_amount;
	}

	/**
	 * @param \Rede\Gateway\Model\unknown $_barcodeNumber
	 */
	public function setBarcodeNumber($_barcodeNumber) {
		$this->_barcodeNumber = (string) $_barcodeNumber;
	}

	/**
	 * @param \Rede\Gateway\Model\unknown $_boletoNumber
	 */
	public function setBoletoNumber($_boletoNumber) {
		$this->_boletoNumber = (string) $_boletoNumber;
	}

	/**
	 * @param \Rede\Gateway\Model\unknown $_merchantId
	 */
	public function setMerchantId($_merchantId) {
		$this->_merchantId = (string) $_merchantId;
	}

	/**
	 * @param \Rede\Gateway\Model\unknown $_orderId
	 */
	public function setOrderId($_orderId) {
		$this->_orderId = (string) $_orderId;
	}

	/**
	 * @param \Rede\Gateway\Model\unknown $_paymentStatus
	 */
	public function setPaymentStatus($_paymentStatus) {
		$this->_paymentStatus = (string) $_paymentStatus;
	}

	/**
	 * @param \Rede\Gateway\Model\unknown $_transactionId
	 */
	public function setTransactionId($_transactionId) {
		$this->_transactionId = (string) $_transactionId;
	}
	/**
	 * @return the $_boletoUrl
	 */
	public function getBoletoUrl() {
		return $this->_boletoUrl;
	}

	/**
	 * @param \Rede\Gateway\Model\unknown $_boletoUrl
	 */
	public function setBoletoUrl($_boletoUrl) {
		$this->_boletoUrl = (string) $_boletoUrl;
	}


}