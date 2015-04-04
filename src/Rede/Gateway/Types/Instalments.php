<?php namespace Rede\Gateway\Types;

/**
 *
 * @author  Lucas Zerma - <lzerma@gmail.com>
 * @since   01/04/2014
 * @project www.lucaszerma.com/eredegw
 * @see     https://github.com/lzerma/gateway_rede
 *
 */
class Instalments
{

    /**
     *
     * @var String - Without card tax
     */
    public static $ZERO_INTEREST = "zero_interest";

    /**
     *
     * @var String - With card tax
     */
    public static $INTEREST_BEARING = "interest_bearing";
}
