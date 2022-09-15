<?php

/**
 * klas ApiHandle upravlja API dijelom projekta
 *
 * @author Andrej Grabovac
 */
class ApiHandle
{
    /**
     * latestRate() funkcija vraca nanjovije tecajeve valuta
     *
     * @return JSON
     */
    public static function latestRate()
    {
        return json_decode(file_get_contents("https://openexchangerates.org/api/latest.json?app_id='".API_ID."'"),true);
    }

    /**
     * historyRate() funkcija vraca povijest na odredeni datum koji korisnik unese
     *
     * @return JSON
     */
    public static function historyRate($userDate)
    {
        return json_decode(file_get_contents("https://openexchangerates.org/api/historical/$userDate.json?app_id='".API_ID."'"),true);
    }

    /**
     * allCurrencies() funckija vraca sbe value
     *
     * @return JSON
     */
    public static function allCurrencies()
    {
        return json_decode(file_get_contents('https://openexchangerates.org/api/currencies.json'),true);
    }
}
?>