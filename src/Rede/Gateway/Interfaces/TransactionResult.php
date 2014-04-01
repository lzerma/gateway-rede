<?php namespace Rede\Gateway\Interfaces;
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
	 * 
	 * @return \Rede\Gateway\Model\TransactionResult;
	 */
	public function getResult();
}