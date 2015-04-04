<?php namespace Rede\Gateway\Model;

/**
 *
 * @author  Lucas Zerma - <lzerma@gmail.com>
 * @since   01/04/2014
 * @project www.lucaszerma.com/eredegw
 * @see     https://github.com/lzerma/gateway_rede
 *
 */
class TransactionDetailsResult
{

    /**
     * @var string
     */
    private $authHostReference;

    /**
     * @var string
     */
    private $gatewayReference;

    /**
     * @var string
     */
    private $extendedResponseMessage;

    /**
     * @var string
     */
    private $extendedStatus;

    /**
     * @var string
     */
    private $merchantReference;

    /**
     *
     * @var string
     */
    private $mid;

    /**
     *
     * @var string
     */
    private $mode;

    /**
     *
     * @var string
     */
    private $reason;

    /**
     *
     * @var string
     */
    private $status;

    /**
     *
     * @var unknown
     */
    private $time;

    /**
     *
     * @var CardResult
     */
    private $cardResult;

    /**
     *
     * @var BoletoResult
     */
    private $boletoResult;

    /**
     *
     * @var ContAuthTxn
     */
    private $contAuthTxn;

    /**
     * @param \SimpleXMLElement $result
     */
    public function __construct(\SimpleXMLElement $result)
    {

        $this->setGatewayReference($result->gateway_reference);
        $this->setMode($result->mode);
        $this->setReason($result->reason);
        $this->setStatus($result->status);
        $this->setTime($result->time);
        $this->setAuthHostReference($result->auth_host_reference);
        $this->setExtendedResponseMessage($result->extended_response_message);
        $this->setExtendedStatus($result->extended_status);
        $this->setMerchantReference($result->merchantreference);
        $this->setMid($result->mid);

        if (isset($result->BoletoTxn)) {
            $this->setBoletoResult(new BoletoResult($result->BoletoTxn));
        } elseif (isset($result->CardTxn)) {
            $this->setCardResult(new CardResult($result));
        } elseif (isset($result->QueryTxnResult)) {
            if (isset($result->QueryTxnResult->BoletoTxn)) {
                $this->setBoletoResult(new BoletoResult($result->QueryTxnResult->BoletoTxn));
            }
        }

        if (isset($result->ContAuthTxn)) {
            $this->setContAuthTxn(new ContAuthTxn($result));
        }
    }

    /**
     * @return the $authHostReference
     */
    public function getAuthHostReference()
    {
        return $this->authHostReference;
    }

    /**
     * @return the $gatewayReference
     */
    public function getGatewayReference()
    {
        return $this->gatewayReference;
    }

    /**
     * @return the $extendedResponseMessage
     */
    public function getExtendedResponseMessage()
    {
        return $this->extendedResponseMessage;
    }

    /**
     * @return the $extendedStatus
     */
    public function getExtendedStatus()
    {
        return $this->extendedStatus;
    }

    /**
     * @return the $merchantReference
     */
    public function getMerchantReference()
    {
        return $this->merchantReference;
    }

    /**
     * @return the $mid
     */
    public function getMid()
    {
        return $this->mid;
    }

    /**
     * @return the $mode
     */
    public function getMode()
    {
        return $this->mode;
    }

    /**
     * @return the $reason
     */
    public function getReason()
    {
        return $this->reason;
    }

    /**
     * @return the $status
     */
    public function getStatus()
    {
        return $this->status;
    }

    /**
     * @return the $time
     */
    public function getTime()
    {
        return $this->time;
    }

    /**
     *
     * @return \Rede\Gateway\Model\CardResult
     */
    public function getCardResult()
    {
        return $this->cardResult;
    }

    /**
     * @param \Rede\Gateway\Model\unknown $authHostReference
     */
    private function setAuthHostReference($authHostReference)
    {
        $this->authHostReference = (string)$authHostReference;
    }

    /**
     * @param \Rede\Gateway\Model\unknown $gatewayReference
     */
    private function setGatewayReference($gatewayReference)
    {
        $this->gatewayReference = (string)$gatewayReference;
    }

    /**
     * @param \Rede\Gateway\Model\unknown $extendedResponseMessage
     */
    private function setExtendedResponseMessage($extendedResponseMessage)
    {
        $this->extendedResponseMessage = (string)$extendedResponseMessage;
    }

    /**
     * @param \Rede\Gateway\Model\unknown $extendedStatus
     */
    private function setExtendedStatus($extendedStatus)
    {
        $this->extendedStatus = (string)$extendedStatus;
    }

    /**
     * @param \Rede\Gateway\Model\unknown $merchantReference
     */
    private function setMerchantReference($merchantReference)
    {
        $this->merchantReference = (string)$merchantReference;
    }

    /**
     * @param \Rede\Gateway\Model\unknown $mid
     */
    private function setMid($mid)
    {
        $this->mid = (string)$mid;
    }

    /**
     * @param \Rede\Gateway\Model\unknown $mode
     */
    private function setMode($mode)
    {
        $this->mode = (string)$mode;
    }

    /**
     * @param \Rede\Gateway\Model\unknown $reason
     */
    private function setReason($reason)
    {
        $this->reason = (string)$reason;
    }

    /**
     * @param \Rede\Gateway\Model\unknown $status
     */
    private function setStatus($status)
    {
        $this->status = (string)$status;
    }

    /**
     *
     * @param string $time
     */
    private function setTime($time)
    {
        $this->time = (int)$time;
    }

    /**
     *
     * @param CardResult $cardResult
     */
    private function setCardResult(CardResult $cardResult)
    {
        $this->cardResult = $cardResult;
    }

    /**
     *
     * @return \Rede\Gateway\Model\BoletoResult
     */
    public function getBoletoResult()
    {
        return $this->boletoResult;
    }

    /**
     *
     * @param BoletoResult $boletoResult
     */
    private function setBoletoResult(BoletoResult $boletoResult)
    {
        $this->boletoResult = $boletoResult;
    }

    /**
     *
     * @return \Rede\Gateway\Model\ContAuthTxn
     */
    public function getContAuthTxn()
    {
        return $this->contAuthTxn;
    }

    /**
     *
     * @param ContAuthTxn $contAuthTxn
     */
    private function setContAuthTxn(ContAuthTxn $contAuthTxn)
    {
        $this->contAuthTxn = $contAuthTxn;
    }
}