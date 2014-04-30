[![Build Status](https://travis-ci.org/lzerma/gateway-rede.svg?branch=master)](https://travis-ci.org/lzerma/gateway-rede)

Payment Gateway - E-Rede
============
This module provides a interface for communication with the payment gateway E-Rede.

For use this library, you need a install, by using [GitHub](http://git@github.com:lzerma/gateway-rede.git) or use composer.

For use composer, edit your *composer.json* and add line below:

> "lzerma/rede-gateway": "stable"

After install the library, you can use setting a few objects to create a request and after send to the gateway.

***Authentication object:***
```php
// Auth object
$auth = new Authetication();
$auth->setAcquirerCode("1212121");
$auth->setPassword("###");
```
In this case, I creating a new object with the ***acquirer code*** *(providing by E-Rede)* and the ***password*** *(provinding by E-Rede)*.

***Card data Object***
```php
// Card object
$card = new Card()

$card->setCardPan("0101010101010101");
$card->setCardExpiryDate("01/15");
$card->setCvc(123);

// In the CartTypes class, exists others methods for configure this object.
$card->setCardMethod(CardTypes::$CARD_TXN_METHOD_AUTH); 

// Set card type operation (Credit ou Debit)
$card->setCardType(CardTypes::$CARD_CREDIT); 

// Country of transaction
$card->setCountry("Brazil"); 
```
This lines above create a new card object with a many information, like a number of card, expiration date of card, security code of card, etc. 
You can find in a list of all parameters [here](#).

For use boleto in your integration, you must need write the lines below:
```php
// Boleto object
$boleto->setFirstName("Lucas");
$boleto->setLastName("Zerma");
$boleto->setBillingStret1("No name street, n/a number");
$boleto->setExpiryDate('2013-05-01');
$boleto->setCustomerEmail("lzerma[at]gmail[dot]com");
$boleto->setCustomerIp(192.168.1.1);
$boleto->setInstructions("Few instructions for the bank employer.");
// Here you can set which processor bank you work. A list of all you find on the respective class. 
$boleto->setProcessorId(\Rede\Gateway\Types\Boleto::$PROCESSOR_BANCOBRASIL);
```

This lines configure one object with all information about the boleto request for sending to gateway e-rede. 

*ps: This properties listed above is only required properties and the list of all the properties you find [here](#)* 

