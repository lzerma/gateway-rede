<?php namespace Rede\Gateway\Types;
/**
 * 
 * @author Lucas Zerma - <lzerma@gmail.com>
 * @since 01/04/2014
 * @project www.lucaszerma.com/eredegw
 * @see https://github.com/lzerma/gateway_rede
 *
 */
class Card {

	/**
	 *
	 * @var Metodo da transacao do cartao
	 */
	public static $CARD_TXN_METHOD_PRE = "pre";
	
	/**
	 *
	 * @var Metodo da transacao do cartao
	 */
	public static $CARD_TXN_METHOD_AUTH = "auth";
	
	/**
	 * Tipo do cartao, se ele e credito ou debito.
	 * @var Tipo do cartao - Credito
	 */
	public static $CARD_CREDIT = "credit";
	
	/**
	 * Tipo do cartao, se ele e debito ou credito.
	 * @var Tipo do cartao - Debito
	 */
	public static $CARD_DEBIT = "debit";
	
	/**
	 * 
	 * @var unknown
	 */
	public static $VISA_ELECTRON = "VISA Electron";
	
	/**
	 * 
	 * @var VISA DEBITO
	 */
	public static $VISA_DEBIT = "VISA Debit";
	
	/**
	 * 
	 * @var unknown
	 */
	public static $VISA = "VISA";
	
	/**
	 * 
	 * @var unknown
	 */
	public static $HIPERCARD = "Hipercard";
	
	/**
	 * 
	 * @var MasterCard Credito
	 */
	public static $MASTERCARD = "MasterCard";
	
	/**
	 * 
	 * @var Maestro
	 */
	public static $MAESTRO = "Maestro";
	
	/**
	 * 
	 * @var Master Card Debito
	 */
	public static $MASTERCARD_DEBIT = "MasterCard Debit";

	/**
	 * 
	 * @var Dinners Club
	 */
	public static $DINNERSCLUB = "DinersClub";
	
	
	/**
	 * 
	 * @var Array
	 */
	public static $allowed_card_types = array("debit", "credit", );
	
	/**
	 * 
	 * @var Array
	 */
	public static $allowed_card_methods = array("pre", "auth", );
}