<?php namespace Rede\Gateway\Interfaces;
/**
 * 
 * @author Lucas Zerma - <lzerma@gmail.com>
 * @since 01/04/2014
 * @project www.lucaszerma.com/eredegw
 * @see https://github.com/lzerma/gateway_rede
 *
 */
interface Client {
	
	/**
	 * 
	 */
	public function init();
	
	/**
	 * 
	 * @param array $data
	 * @param string $type
	 * @return \Rede\Gateway\Client\Client
	 */
	public function add($data, $type = CURLOPT_POST, $raw = false);
	
	/**
	 * 
	 * @return \Rede\Gateway\Client\Client
	 */
	public function send();
	
	/**
	 * @param string $_endpoint
	 */
	public function setEndpoint($_endpoint);
	
	/**
	 * @return the $_response
	 */
	public function getResponse();
}