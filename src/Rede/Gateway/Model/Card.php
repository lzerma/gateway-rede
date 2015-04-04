<?php namespace Rede\Gateway\Model;

use Rede\Gateway\Exceptions\Card as CardException;
use Rede\Gateway\Interfaces\Model;
use Rede\Gateway\Types\Card as CardTypes;

/**
 *
 * @author  Lucas Zerma - <lzerma@gmail.com>
 * @since   01/04/2014
 * @project www.lucaszerma.com/eredegw
 * @see     https://github.com/lzerma/gateway_rede
 *
 */
class Card implements Model
{

    /**
     *
     * @var unknown
     */
    private $cardPan;

    /**
     *
     * @var unknown
     */
    private $cardExpiryDate;

    /**
     *
     * @var unknown
     */
    private $cardSchema;

    /**
     *
     * @var unknown
     */
    private $cardType;

    /**
     *
     * @var unknown
     */
    private $cardMethod;

    /**
     *
     * @var unknown
     */
    private $country = "Brazil";

    /**
     *
     * @var String
     */
    private $cvc;

    /**
     *
     */
    public function __construct()
    {

    }

    public function getXml()
    {
        $xml = "
				<CardTxn>
					<method>{$this->getCardMethod()}</method>
					<Card>
						<Cv2Avs>
							<cv2>{$this->getCvc()}</cv2>
						</Cv2Avs>
						
						<pan>{$this->getCardPan()}</pan>
						<expirydate>{$this->getCardExpiryDate()}</expirydate>
						<card_account_type>{$this->getCardType()}</card_account_type>
					</Card>
				</CardTxn>
				";

        return $xml;
    }

    /**
     * @return the $cardPan
     */
    public function getCardPan()
    {
        return $this->cardPan;
    }

    /**
     * @return the $cardExpiryDate
     */
    public function getCardExpiryDate()
    {
        return $this->cardExpiryDate;
    }

    /**
     * @see Veja Types\Card para mais informacoes
     * @return the $cardSchema
     */
    public function getCardSchema()
    {
        return $this->cardSchema;
    }

    /**
     * @return the $country
     */
    public function getCountry()
    {
        return $this->country;
    }

    /**
     * @param field_type $cardPan
     */
    public function setCardPan($cardPan)
    {
        $this->cardPan = $cardPan;
    }

    /**
     * @param field_type $cardExpiryDate
     */
    public function setCardExpiryDate($cardExpiryDate)
    {
        $this->cardExpiryDate = $cardExpiryDate;
    }

    /**
     * @see Veja Types\Card para mais informacoes
     *
     * @param CardType $cardSchema
     */
    public function setCardSchema($cardSchema)
    {
        $this->cardSchema = $cardSchema;
    }

    /**
     * @param string $country
     */
    public function setCountry($country)
    {
        $this->country = $country;
    }

    /**
     * @see Veja Types\Card para mais informacoes
     * @return the $cardType
     */
    public function getCardType()
    {
        return $this->cardType;
    }

    /**
     * @see Veja Types\Card para mais informacoes
     * @return the $cardMethod
     */
    public function getCardMethod()
    {
        return $this->cardMethod;
    }

    /**
     * @see Veja Types\Card para mais informacoes
     *
     * @param field_type $cardType
     */
    public function setCardType($cardType)
    {
        $this->cardType = $cardType;
    }

    /**
     * @see Veja Types\Card para mais informacoes
     *
     * @param unknown $cardMethod
     */
    public function setCardMethod($cardMethod)
    {
        if (in_array($cardMethod, CardTypes::$allowed_card_methods)) {
            $this->cardMethod = $cardMethod;
        } else {
            throw new CardException("Passe um metodo valido.", CardException::$INCORRECT_METHOD);
        }
    }

    /**
     * @return the $cvc
     */
    public function getCvc()
    {
        return $this->cvc;
    }

    /**
     * @param string $cvc
     */
    public function setCvc($cvc)
    {
        $this->cvc = $cvc;
    }
}
