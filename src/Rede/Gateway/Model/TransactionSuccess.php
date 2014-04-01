<?php namespace Rede\Gateway\Model;
use Rede\Gateway\Transaction\TransactionResult;
use Rede\Gateway\Interfaces\TransactionResult as TransactionResultInterface;
use \SimpleXMLElement as SimpleXMLElement;
/**
 * 
 * @author Lucas Zerma - <lzerma@gmail.com>
 * @since 01/04/2014
 * @project www.lucaszerma.com/eredegw
 * @see https://github.com/lzerma/gateway_rede
 *
 */
class TransactionSuccess implements TransactionResultInterface {
	
	/**
	 * 
	 * @var CardResult
	 */
	private $cardResult; 
	
	/**
	 * 
	 * @var unknown
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
	 * @return \Rede\Gateway\Model\TransactionResult;
	 */
	public function getResult() {
		return $this->result;
	}
	
	private function parse($result) {
		$transactionDetailsResult = new TransactionDetailsResult($result);
		$this->setTransactionDetailsResult($transactionDetailsResult);
	}

	/**
	 * @param \Rede\Gateway\Model\TransactionResult; $result
	 */
	public function setResult($result) {
		$this->result = $result;
	}

	/**
	 * 
	 * @return \Rede\Gateway\Model\CardResult
	 */
	public function getCardResult() {
		return $this->cardResult;
	}

	/**
	 * @param \Rede\Gateway\Model\CardResult $cardResult
	 */
	public function setCardResult($cardResult) {
		$this->cardResult = $cardResult;
	}
	/**
	 * @return the $transactionDetailsResult
	 */
	public function getTransactionDetailsResult() {
		return $this->transactionDetailsResult;
	}

	/**
	 * @param \Rede\Gateway\Model\unknown $transactionDetailsResult
	 */
	public function setTransactionDetailsResult($transactionDetailsResult) {
		$this->transactionDetailsResult = $transactionDetailsResult;
	}


}