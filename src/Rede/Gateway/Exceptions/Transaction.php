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
class Transaction extends Exception {

	/**
	 * 
	 * @var Unknown Bearing Type
	 */
	public static $UNKNOWN_BEARING = 1;
	
	/**
	 * 
	 * @var Bearing not informed
	 */
	public static $NOT_INFORMED_BEARING = 2;
	
	/**
	 * 
	 * @var The parameter is not valid
	 */
	public static $PARAM_NOT_VALID = 3;
	
	/**
	 * 
	 * @var Body of request is malformed.
	 */
	public static $MALFORMED_BODY = 4;
	
	/**
	 * 
	 * @var Errors in amount property
	 */
	public static $AMOUNT_ERROR = 5;
	
	/**
	 * 
	 * @param unknown $messase
	 * @param unknown $code
	 */
	public function __construct($messase = null, $code = null) {
		parent::__construct($messase, $code, null);
	}
}
