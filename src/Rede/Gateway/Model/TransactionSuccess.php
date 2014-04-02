<?php namespace Rede\Gateway\Model;
use Rede\Gateway\Interfaces\TransactionResult;
use \SimpleXMLElement as SimpleXMLElement;
/**
 * 
 * @author Lucas Zerma - <lzerma@gmail.com>
 * @since 01/04/2014
 * @project www.lucaszerma.com/eredegw
 * @see https://github.com/lzerma/gateway_rede
 *
 */
class TransactionSuccess implements TransactionResult {

	/**
	 * 
	 * @var TransactionDetailsResult
	 */
	private $transactionDetailsResult;
	
	/**
	 * 
	 * @param SimpleXMLElement $result
	 */
	public function __construct(SimpleXMLElement $result) {
		$this->parse($result);
	}
	
	/**
	 * 
	 * @param SimpleXMLElement $result
	 */
	private function parse($result) {
		$transactionDetailsResult = new TransactionDetailsResult($result);
		$this->setTransactionDetailsResult($transactionDetailsResult);
	}

	/**
	 * (non-PHPdoc)
	 * @see \Rede\Gateway\Interfaces\TransactionResult::getTransactionDetailsResult()
	 */
	public function getTransactionDetailsResult() {
		return $this->transactionDetailsResult;
	}

	/**
	 * 
	 * @param TransactionDetailsResult $transactionDetailsResult
	 */
	private function setTransactionDetailsResult(TransactionDetailsResult $transactionDetailsResult) {
		$this->transactionDetailsResult = $transactionDetailsResult;
	}
	
	/**
	 * (non-PHPdoc)
	 * @see \Rede\Gateway\Interfaces\TransactionResult::getInformation()
	 */
	public function getInformation() {
		return $this->information;
	}
}