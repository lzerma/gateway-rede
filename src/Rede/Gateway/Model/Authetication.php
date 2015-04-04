<?php namespace Rede\Gateway\Model;
use Rede\Gateway\Interfaces\Model;
/**
 * 
 * @author Lucas Zerma - <lzerma@gmail.com>
 * @since 01/04/2014
 * @project www.lucaszerma.com/eredegw
 * @see https://github.com/lzerma/gateway_rede
 *
 */
class Authetication implements Model {

	/**
	 * 
	 * @var String
	 */
	protected $AcquirerCode;
	
	/**
	 * 
	* @var String
	 */
	protected $Password;
	
	
	/**
	 * 
	 */
	public function __construct() {
		
	}
	
	public function getXml() {
		$xml = "<Authentication>
					<AcquirerCode>
						<rdcd_pv>{$this->getAcquirerCode()}</rdcd_pv>
					</AcquirerCode>
					<password>{$this->getPassword()}</password>
				</Authentication>";
		return $xml;  
	}
	
	/**
	 * @return the $AcquirerCode
	 */
	public function getAcquirerCode() {
		return $this->AcquirerCode;
	}

	/**
	 * @return the $Password
	 */
	public function getPassword() {
		return $this->Password;
	}

	/**
	 * @param string $AcquirerCode
	 */
	public function setAcquirerCode($AcquirerCode) {
		$this->AcquirerCode = $AcquirerCode;
	}

	/**
	 * @param string $Password
	 */
	public function setPassword($Password) {
		$this->Password = $Password;
	}
}
