<?php namespace Rede\Gateway\Types;
/**
 * 
 * @author Lucas Zerma - <lzerma@gmail.com>
 * @since 01/04/2014
 * @project www.lucaszerma.com/eredegw
 * @see https://github.com/lzerma/gateway_rede
 *
 */
class TxnDetails {

	/**
	 * 
	 * @var String - CONT_AUTH - Capture Method for historical transactions.
	 */
	public static $CAPTURE_METHOD_CONTAUTH = "cont_auth";
	
	/**
	 *
	 * @var String - ECOMM Capture Method
	 */
	public static $CAPTURE_METHOD_ECOMM = "ecomm";
}