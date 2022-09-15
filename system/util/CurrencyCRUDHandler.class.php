<?php
require_once('ApiHandler.class.php');

class CurrencyCRUD
{
    public static function createCurrency($currency)
    {
        $sql = "INSERT INTO currency (code) VALUES ('". $currency. "')";
        AppCore::getDB()->sendQuery($sql);
    }

    public static function readAllCurrency()
    {
        $sql = "SELECT * FROM currency";
        $query = AppCore::getDB()->sendQuery($sql);

        $rows = [];
        while ($row = $query -> fetch_assoc()) {
            $rows[] = $row;
        }
        return $rows;
    }

    public static function getCurrency($currencyCode)
    {
        $sql = "SELECT * FROM currency WHERE code = '" . $currencyCode . "'";
        $query = AppCore::getDB()->sendQuery($sql);

        while ($row = $query->fetch_assoc()) {
            $cur[] = $row;
        }

        return $cur;
    }

    public static function deleteCurrency($currency)
    {
        $sql = "DELETE FROM currency WHERE code = '" . $currency . "'";
        AppCore::getDB()->sendQuery($sql);
    }

    public static function checkCurrency($currency)
    {
        $sql = "SELECT * FROM currency WHERE code = '" . $currency . "'";
        $query = AppCore::getDB()->sendQuery($sql);

        if (mysqli_num_rows($query) > 0) return true;
        else return false;
    }
}
