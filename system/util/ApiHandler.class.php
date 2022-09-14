<?php

class apiHandle
{
    public static function latestRate()
    {
        return json_decode(file_get_contents("https://openexchangerates.org/api/latest.json?app_id='" . API_ID . "'"), true);
    }

    public static function historyRate($userDate)
    {
        return json_decode(file_get_contents("https://openexchangerates.org/api/historical/$userDate.json?app_id='" . API_ID . "'"), true);
    }

    public static function allCurrencies()
    {
        return json_decode(file_get_contents('https://openexchangerates.org/api/currencies.json'), true);
    }
}