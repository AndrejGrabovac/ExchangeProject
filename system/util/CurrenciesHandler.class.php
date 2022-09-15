<?php
require_once('ApiHandler.class.php');

/**
 * klasa currenciesHandler obraduje podatke za valute u tablici
 *
 * @author Andrej Grabovac
 */

class CurrenciesHandler
{
    /**
     * insertCurrency() funkcija ubacuje valutu u currency tablicu iz Api
     */
    public static function insertCurrency()
    {
        $currency = apiHandle::allCurrencies();

        foreach ($currency as $key => $value) {
            $sql = "INSERT INTO currency (code, curName) VALUES ( '" . $key . "', '" . $value . "')";
            AppCore::getDB()->sendQuery($sql);
        }
    }

    /**
     * checkCurrency() funkcija provjerava postoji li valuta ako ne postoji upisat ce novu valutu ako postoji nece ge upisati
     */
    public static function checkCurrency($code)
    {
        $sql = "SELECT * FROM currency WHERE code = '" . $code . "'";
        $query = AppCore::getDB()->sendQuery($sql);

        if (mysqli_num_rows($query) === 1)
            return true;
        else return false;
    }

    /**
     * checkAllCurrencies() funkcija provjerava ako je tablica prazna
     *
     * @return boolean
     */
    public static function checkAllCurrencies()
    {
        $sql = "SELECT * FROM currency";
        $query = AppCore::getDB()->sendQuery($sql);

        if (mysqli_num_rows($query) > 1) {
            return true;
        } else {
            return false;
        }
    }
}
