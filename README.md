[![Build Status](https://travis-ci.org/lzerma/gateway-rede.svg?branch=master)](https://travis-ci.org/lzerma/gateway-rede)

Payment Gateway - E-Rede
============
This module provides a interface for communication with the payment gateway E-Rede.

For use this library, you need a install, by using [GitHub](http://git@github.com:lzerma/gateway-rede.git) or use composer.

For use composer, edit your *composer.json* and add line above:

> "lzerma/rede-gateway": "stable"

After install the library, you can use setting a few objects to create a request and after send to the gateway.

***Authentication object:***
```
// Auth object
$auth = new Authetication();
$auth->setAcquirerCode("1212121");
$auth->setPassword("###");
```
In this case, I creating a new object with the *acquirer code (providing by E-Rede)* and the *password (provinding by E-Rede)*.

***Card data Object***
```
// Dados do cartao
$card->setCardPan("0101010101010101");
$card->setCardExpiryDate("01/15");
$card->setCvc(123);
$card->setCardMethod(CardTypes::$CARD_TXN_METHOD_AUTH); // In the CartTypes class, exists others methods for configure this object.
$card->setCardType(CardTypes::$CARD_CREDIT); // Set card operation
$card->setCountry("Brazil"); // Country of transaction
```