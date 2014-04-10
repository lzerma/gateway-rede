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
require_once("bootstrap.php");
$request = new Request();
$auth = new Authetication();
$card = new Card();
$boleto = new Boleto();

// Autenticacao
$auth->setAcquirerCode("049058967");
$auth->setPassword("TgHFE25T");

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

// Dados da transacao
$transaction = new Transaction($card);
// $transaction->setRecurring(\Rede\Gateway\Types\Transaction::$RECURRING_SETUP);
$transaction->setHistoricReference("3000900010043313");
$transaction->setRecurring(\Rede\Gateway\Types\Transaction::$RECURRING_HISTORIC);
$transaction->setAmount(1000);
$transaction->setMerchantreference(uniqid("ymo_"));
$transaction->setInstalments(5);
$transaction->setInstalments_type(\Rede\Gateway\Types\Transaction::$ZERO_INTEREST);

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