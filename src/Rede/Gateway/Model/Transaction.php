<?php namespace Rede\Gateway\Model;
use Rede\Gateway\Interfaces\Model;
use Rede\Gateway\Types\Transaction as TransactionTypes;
use Rede\Gateway\Types\TxnDetails as TxnDetailsTypes;
use Rede\Gateway\Exceptions\Transaction as TransactionException;

/**
 * 
 * @author Lucas Zerma - <lzerma@gmail.com>
 * @since 01/04/2014
 * @project www.lucaszerma.com/eredegw
 * @see https://github.com/lzerma/gateway_rede
 *
 */
class Transaction implements Model {

	/**
	 * 
	 * @var Card
	 */
	private $_card = null;
	
	/**
	 * 
	 * @var Boleto
	 */
	private $_boleto = null;

	/**
	 * 
	 * @var TxnDetails
	 */
	private $_txnDetails;
	
	/**
	 * 
	 * @var String
	 */
	private $_type;
	
	/**
	 * 
	 * @var HistoricTxn
	 */
	private $_historicTxn;
	
	/**
	 * 
	 * @param Model $txn
	 * @throws TransactionException
	 */
	public function __construct(Model $txn) {
		if($txn instanceof Card) {
			$this->setCard($txn);
		}
		elseif($txn instanceof Boleto) {
			$this->setBoleto($txn);
		}
		else {
			throw new TransactionException("The param must be a valid model interface, got: ".get_class($txn), TransactionException::$PARAM_NOT_VALID);
		}
	}
	
	/**
	 * (non-PHPdoc)
	 * @see \Rede\Gateway\Interfaces\Model::getXml()
	 */
	public function getXml() {
		$xml = "<Transaction>";
		$xml .= $this->_getBody();
		$xml .= "</Transaction>";
		return $xml;  
	}
	
	/**
	 * 
	 * @throws TransactionException
	 * @return string
	 */
	private function _getBody() {

		$ret = "";
		switch($this->getType()) {
			
			case TransactionTypes::$HISTORIC_QUERY: 
				if($this->getHistoricTxn()) {
					$ret .= $this->getHistoricTxn()->getXml();
				}
			break;			
			case TransactionTypes::$RECURRING_HISTORIC:
				$ret = "<ContAuthTxn type='historic'/>";
				if($this->getHistoricTxn()) {
					$ret .= $this->getHistoricTxn()->getXml();
				}
				
				if($this->getTxnDetails()) {
					$this->getTxnDetails()->setInstalments(null);
					$this->getTxnDetails()->setCaptureMethod(TxnDetailsTypes::$CAPTURE_METHOD_CONTAUTH);
					$ret .= $this->getTxnDetails()->getXml();
				}
				
				return $ret; 
				break;
			case TransactionTypes::$RECURRING_SETUP:
				$ret .= "<ContAuthTxn type='setup'/>";
			default:
				
				if($this->getCard() instanceof Card) {
					$ret .= $this->getCard()->getXml();
				}
				else if($this->getBoleto() instanceof Boleto) {
					$this->getTxnDetails()->setInstalments(null);
					$ret .= $this->getBoleto()->getXml();
				}
				
				if($this->getTxnDetails())
					$ret .= $this->getTxnDetails()->getXml();
				break; 
		}
		return $ret;
	}
	
	/**
	 * 
	 * @return \Rede\Gateway\Model\Card
	 */
	public function getCard() {
		return $this->_card;
	}

	/**
	 * 
	 * @param Card $_card
	 */
	public function setCard(Card $_card) {
		$this->_card = $_card;
	}

	/**
	 * 
	 * @return \Rede\Gateway\Model\Boleto
	 */
	public function getBoleto() {
		return $this->_boleto;
	}

	/**
	 * 
	 * @param Boleto $_boleto
	 */
	public function setBoleto(Boleto $_boleto) {
		$this->_boleto = $_boleto;
	}

    /**
     * Define a setup transaction for a recurring transaction (Historic Payment - Controlled by merchant)
     *
     * @param $_recurring
     *
     * @throws \Rede\Gateway\Exceptions\Transaction
     */
    public function setRecurring($_recurring) {
		switch ($_recurring) {
			case TransactionTypes::$RECURRING_SETUP:
			case TransactionTypes::$RECURRING_HISTORIC:
				$this->_recurring = $_recurring;
				break;
			default:
				throw new TransactionException("Type for recurring transaction unknown. Got: {$_recurring}");
				break;
		}
	}

	/**
	 * 
	 * @return \Rede\Gateway\Model\HistoricTxn
	 */
	public function getHistoricTxn() {
		return $this->_historicTxn;
	}

	/**
	 * 
	 * @param HistoricTxn $_historicTxn
	 */
	public function setHistoricTxn(HistoricTxn $_historicTxn) {
		$this->_historicTxn = $_historicTxn;
	}
	
	/**
	 * 
	 * @return \Rede\Gateway\Model\TxnDetails
	 */
	public function getTxnDetails() {
		return $this->_txnDetails;
	}

	/**
	 * 
	 * @param TxnDetails $_txnDetails
	 */
	public function setTxnDetails(TxnDetails $_txnDetails) {
		$this->_txnDetails = $_txnDetails;
	}
	
	/**
	 * @return the $_type
	 */
	public function getType() {
		return $this->_type;
	}

	/**
	 * @param string $_type
	 */
	public function setType($_type) {
		$this->_type = $_type;
	}

}