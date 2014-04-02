<?php namespace Rede\Gateway\Types;
/**
 * 
 * @author Lucas Zerma - <lzerma@gmail.com>
 * @since 01/04/2014
 * @project www.lucaszerma.com/eredegw
 * @see https://github.com/lzerma/gateway_rede
 *
 */
class Boleto {

	/**
	 * 
	 * @var Itau Bank
	 */
	public static $PROCESSOR_ITAU = 11;

	/**
	 * 
	 * @var Bradesco Bank
	 */
	public static $PROCESSOR_BRADESCO = 12;

	/**
	 * 
	 * @var Bank of Brazil
	 */
	public static $PROCESSOR_BANCOBRASIL = 13;

	/**
	 * 
	 * @var HSBC Bank
	 */
	public static $PROCESSOR_HSBC = 14;

	/**
	 * 
	 * @var Santader Bank
	 */
	public static $PROCESSOR_SANTANDER = 15;

	/**
	 * 
	 * @var Caixa Economica Federal
	 */
	public static $PROCESSOR_CEF = 16;
}