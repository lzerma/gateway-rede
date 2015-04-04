<?php namespace Rede\Gateway\Exceptions;
use \Exception as Exception;
/**
 * 
 * @author Lucas Zerma - <lzerma@gmail.com>
 * @since 01/04/2014
 * @project www.lucaszerma.com/eredegw
 * @see https://github.com/lzerma/gateway_rede
 *
 */
class TransactionResult extends Exception {

	/**
	 * 
	 * @var String
	 */
	public static $IS_NOT_VALID_OBJECT = 1;
	
	/**
	 *
	 * @var String
	 */
	public static $RESULT_NOT_MAPPED = 2;

	/**
	 * 
	 * @var For general errors
	 */
	public static $RESULT_ERROR = 3;
	
	/**
	 * 
	 * @param unknown $messase
	 * @param unknown $code
	 */
	public function __construct($messase = null, $code = null) {
		parent::__construct($messase, $code, null);
	}
}
