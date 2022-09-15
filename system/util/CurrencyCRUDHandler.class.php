<?php
require_once('ApiHandler.class.php');

/**
 * CurrencyCRUD klasa za obradu podataka koji korisnik unosi
 *
 * @author Andrej Grabovac
 */

class CurrencyCRUD
{
    /**
     * createCurrency() funkcija stvara novu valutu koju korisnik unese
     *
     * @param string $currency
     */

    public static function createCurrency($currency)
    {
        $sql = "INSERT INTO currency (code) VALUES ('". $currency. "')";
        AppCore::getDB()->sendQuery($sql);
    }

    /**
     * readAllCurrencies() funkcija ispisuje sve valute iz tablice
     *
     * @return array $rows
     */
    public static function readAllCurrencies()
    {
        $sql = "SELECT * FROM currency";
        $query = AppCore::getDB()->sendQuery($sql);

        $rows = [];
        while ($row = $query -> fetch_assoc()) {
            $rows[] = $row;
        }
        return $rows;
    }

    /**
     * getCurrency() funkcija ispisuje valutu koju korsnik zeli
     *
     * @return array $cur
     */
    public static function getCurrency($currencyCode)
    {
        $sql = "SELECT * FROM currency WHERE code = '" . $currencyCode . "'";
        $query = AppCore::getDB()->sendQuery($sql);

        while ($row = $query->fetch_assoc()) {
            $cur[] = $row;
        }

        return $cur;
    }

    /**
     * deleteCurrency() funkcija brise valutu iz tablice
     */
    public static function deleteCurrency($currency)
    {
        $sql = "DELETE FROM currency WHERE code = '" . $currency . "'";
        AppCore::getDB()->sendQuery($sql);
    }

    /**
     * checkCurrency() funkcija provjerava da li trazena valuta postoji
     *
     * @param string $currency
     *
     * @return boolean
     */
    public static function checkCurrency($currency)
    {
        $sql = "SELECT * FROM currency WHERE code = '" . $currency . "'";
        $query = AppCore::getDB()->sendQuery($sql);

        if (mysqli_num_rows($query) > 0){
            return true;
        } else {
        return false;
        }
    }
}