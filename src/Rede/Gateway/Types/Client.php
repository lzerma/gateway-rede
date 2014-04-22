<?php namespace Rede\Gateway\Types;
/**
 * 
 * @author Lucas Zerma - <lzerma@gmail.com>
 * @since 01/04/2014
 * @project www.lucaszerma.com/eredegw
 * @see https://github.com/lzerma/gateway_rede
 *
 */
class Client {

	/**
	 * Endpoint for development transactions
	 * @var String
	 */
	public static $PRODUCTION_URI = "https://ecommerce.userede.com.br/Transaction/wsTransaction";
	
	/**
	 * Endpoint for production transactions
	 * @var String
	 */
	public static $DEVELOP_URI = "https://scommerce.userede.com.br/Beta/wsTransaction";
	
}