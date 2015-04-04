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
class Boleto extends Exception {

	/**
	 * 
	 * @var Unknown processor bank
	 */
	public static $UNKNOWN_PROCESSOR = 1;
	
	/**
	 * 
	 * @param unknown $messase
	 * @param unknown $code
	 */
	public function __construct($messase = null, $code = null) {
		parent::__construct($messase, $code, null);
	}
}
