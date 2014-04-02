<?php namespace Rede\Gateway\Types;
/**
 * 
 * @author Lucas Zerma - <lzerma@gmail.com>
 * @since 01/04/2014
 * @project www.lucaszerma.com/eredegw
 * @see https://github.com/lzerma/gateway_rede
 *
 */
class Transaction {
	
	/**
	 * 
	 * @var Without card tax 
	 */
	public static $ZERO_INTEREST = "zero_interest";
	
	/**
	 * 
	 * @var With card tax
	 */
	public static $INTEREST_BEARING = "interest_bearing";
}