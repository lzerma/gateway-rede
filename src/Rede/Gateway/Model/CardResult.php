<?php namespace Rede\Gateway\Model;

/**
 * 
 * @author Lucas Zerma - <lzerma@gmail.com>
 * @since 01/04/2014
 * @project www.lucaszerma.com/eredegw
 * @see https://github.com/lzerma/gateway_rede
 *
 */
class CardResult {
	
	/**
	 * 
	 * @var Card
	 */
	private $cardType;
	
	/**
	 * 
	 * @var String
	 */
	private $cv2Status;
	
	/**
	 * 
	 * @var Integer
	 */
	private $authCode;
	
	/**
	 * 
	 * @var String
	 */
	private $cardScheme;
	
	/**
	 * 
	 * @var String
	 */
	private $country;
	
	/**
	 * 
	 * @var String
	 */
	private $issuer;

    /**
     * @param \SimpleXMLElement $result
     */
    public function __construct(\SimpleXMLElement $result) {
		$this->setCardType($result->Card->card_account_type);
		$this->setAuthCode($result->CardTxn->authcode);
		$this->setCardScheme($result->CardTxn->card_scheme);
		if(isset($result->CardTxn)) {
			$this->setCv2Status($result->CardTxn->Cv2Avs->cv2avs_status);
		}
		$this->setCountry($result->CardTxn->country);
		$this->setIssuer($result->CardTxn->issuer);
	}
	
	/**
	 * @return the $cardType
	 */
	public function getCardType() {
		return $this->cardType;
	}

	/**
	 * @return the $cv2Status
	 */
	public function getCv2Status() {
		return $this->cv2Status;
	}

	/**
	 * @return the $authCode
	 */
	public function getAuthCode() {
		return $this->authCode;
	}

	/**
	 * @return the $cardScheme
	 */
	public function getCardScheme() {
		return $this->cardScheme;
	}

	/**
	 * @return the $country
	 */
	public function getCountry() {
		return $this->country;
	}

	/**
	 * @return the $issuer
	 */
	public function getIssuer() {
		return $this->issuer;
	}

	/**
	 * @param \Rede\Gateway\Types\Card $cardType
	 */
	public function setCardType($cardType) {
		$this->cardType = (string) $cardType;
	}

	/**
	 * @param string $cv2Status
	 */
	public function setCv2Status($cv2Status) {
		$this->cv2Status = (string) $cv2Status;
	}

	/**
	 * @param number $authCode
	 */
	public function setAuthCode($authCode) {
		$this->authCode = (string) $authCode;
	}

	/**
	 * @param string $cardScheme
	 */
	public function setCardScheme($cardScheme) {
		$this->cardScheme = (string) $cardScheme;
	}

	/**
	 * @param string $country
	 */
	public function setCountry($country) {
		$this->country = (string) $country;
	}

	/**
	 * @param string $issuer
	 */
	public function setIssuer($issuer) {
		$this->issuer = (string) $issuer;
	}
}
