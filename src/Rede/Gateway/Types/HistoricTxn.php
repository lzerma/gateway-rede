<?php namespace Rede\Gateway\Types;
/**
 * 
 * @author Lucas Zerma - <lzerma@gmail.com>
 * @since 01/04/2014
 * @project www.lucaszerma.com/eredegw
 * @see https://github.com/lzerma/gateway_rede
 *
 */
class HistoricTxn {
	
	/*
	 * 
	 * @var String - Method for historical Transaction consult.
	 */
	public static $METHOD_QUERY = "query";
	
	/*
	 *
	* @var String - Method for historical Transaction payment.
	*/
	public static $METHOD_AUTH = "auth";
}