<?php 
namespace tests;
use Rede\Gateway\Model\Authetication;
use Rede\Gateway\Client\Client;
use Rede\Gateway\Model\Card;
use Rede\Gateway\Types\Card as CardTypes;
use Rede\Gateway\Model\Transaction;
use Rede\Gateway\Request;
use Rede\Gateway\Gateway;
use Rede\Gateway\Client\Curl;
use Rede\Gateway\Model\Boleto;
use Rede\Gateway\Model\HistoricTxn;
use Rede\Gateway\Types\HistoricTxn as HistoricTxnTypes;
use Rede\Gateway\Model\TxnDetails;
use Rede\Gateway\Types\Instalments;
require_once("bootstrap.php");
$request = new Request();
$card = new Card();
$boleto = new Boleto();

// Auth
$auth = new Authetication();
$auth->setAcquirerCode("XXXXXXXX");
$auth->setPassword("XXXXXX");

// Dados do cartao
$card->setCardPan("6062825624254001");
$card->setCardExpiryDate("01/15");
$card->setCvc(123);
$card->setCardMethod(CardTypes::$CARD_TXN_METHOD_AUTH);
$card->setCardType(CardTypes::$CARD_CREDIT);
$card->setCountry("Brazil");

// Dados do boleto
$boleto->setFirstName("Lucas");
$boleto->setLastName("Zerma");
$boleto->setBillingStret1("Rua Sem Nome, s/ numero");
$boleto->setExpiryDate('2013-05-01');
$boleto->setCustomerEmail("lzerma@gmail.com");
$boleto->setCustomerIp($_SERVER["REMOTE_ADDR"]);
$boleto->setInstructions("Não receber após o vencimento.");
$boleto->setProcessorId(\Rede\Gateway\Types\Boleto::$PROCESSOR_BANCOBRASIL);

// Dados historicos
$historic = new HistoricTxn();
$historic->setReference("3600900010040953");
$historic->setMethod(HistoricTxnTypes::$METHOD_QUERY);

// Detalhes da transacao
$details = new TxnDetails();
$details->setAmount(1000);
$details->setMerchantreference(uniqid("ymo_"));
$details->setInstalments(5);
$details->setInstalments_type(Instalments::$ZERO_INTEREST);

// print("<pre>");print_r($historic->getXml());die();
// die("AE");
// Dados da transacao
$transaction = new Transaction($boleto);
$transaction->setTxnDetails($details);
// $transaction->setHistoricTxn($historic);
// $transaction->setType(\Rede\Gateway\Types\Transaction::$RECURRING_SETUP);
// $transaction->setType(\Rede\Gateway\Types\Transaction::$HISTORIC_QUERY);
// $transaction->setType(\Rede\Gateway\Types\Transaction::$RECURRING_HISTORIC);

// Dados da requisicao
$request->setAuth($auth);
$request->setTransaction($transaction);

$payment = new Gateway($request, new Curl());
$result = $payment->send();
$result = $result->getTransactionDetailsResult();
print("<pre>");print_r($result);die();



header("Content-type: text/xml");
// $client = new Client();
// $client->add($gateway->authenticate($auth));
// $ret = $client->send();

// print($xml);
// print($ret->getResponse());
// print("<pre>");print_r();die();
// print("<pre>");print_r($gateway->authenticate($auth));die();
