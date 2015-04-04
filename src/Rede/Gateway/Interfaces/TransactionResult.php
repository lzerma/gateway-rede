<?php namespace Rede\Gateway\Interfaces;
use Rede\Gateway\Model\TransactionDetailsResult;
/**
 * 
 * @author Lucas Zerma - <lzerma@gmail.com>
 * @since 01/04/2014
 * @project www.lucaszerma.com/eredegw
 * @see https://github.com/lzerma/gateway_rede
 *
 */
interface TransactionResult {
	
	/**
	 * @return TransactionDetailsResult
	 */
	public function getTransactionDetailsResult();
	
	/**
	 * @return string
	 */
	public function getInformation();
}
