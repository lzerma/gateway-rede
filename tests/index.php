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
require_once("bootstrap.php");

$request = new Request();
$auth = new Authetication();
$card = new Card();

// Autenticacao
$auth->setAcquirerCode("049058967");
$auth->setPassword("TgHFE25T");

// Dados do cartao
$card->setCardPan("5440000000007");
$card->setCardExpiryDate("01/15");
$card->setCvc(123);
$card->setCardMethod(CardTypes::$CARD_TXN_METHOD_AUTH);
$card->setCardType(CardTypes::$CARD_CREDIT);
$card->setCountry("Brazil");

// Dados da transacao
$transaction = new Transaction($card);
$transaction->setAmount(1000);
$transaction->setMerchantreference(uniqid("ymo_"));

// Dados da requisicao
$request->setAuth($auth);
$request->setTransaction($transaction);

$payment = new Gateway($request, new Curl());
$a = $payment->send();
print("<pre>");print_r($a->getTransactionResult());die();



header("Content-type: text/xml");
// $client = new Client();
// $client->add($gateway->authenticate($auth));
// $ret = $client->send();

// print($xml);
// print($ret->getResponse());
// print("<pre>");print_r();die();
// print("<pre>");print_r($gateway->authenticate($auth));die();