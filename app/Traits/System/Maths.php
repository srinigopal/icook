<?php

namespace App\Traits\System;

use \NumberFormatter;

trait Maths
{

    private function convertDollarsToCents($amount = null)
    {
        
        if (! $amount) {
            return null;
        }

        //https://stackoverflow.com/a/54865653
        return intval(strval(floatval(preg_replace("/[^0-9.]/", "", str_replace(',','.',$amount))) * 100));

    }

    private function convertCentsToDollars($amount = null)
    {
        
        if (! $amount) {
            return null;
        }

        //TODO - Replace hard coded location and currency values with localized ones
        $location = 'en_AU';
        $currency = 'AUD';

        $numberFormatter = new NumberFormatter($location, NumberFormatter::CURRENCY);

        return $numberFormatter->formatCurrency($amount, $currency);

    }

}