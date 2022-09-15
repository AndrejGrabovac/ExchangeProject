<?php
require_once('ApiHandler.class.php');

/**
 * klasa rateHandler obraduje sve vezano zua tecajeve valuta
 *
 * @author Andrej Grabovac
 */

class RateHandler
{
    /**
     * checkIfEmpty() funkcija provjerava da li je tablica rates prazna
     *
     * @return boolean
     */
    public static function checkIfEmpty()
    {
        $sql = "SELECT * FROM rates";
        $query = AppCore::getDB()->sendQuery($sql);

        if (mysqli_num_rows($query) < 1) return true;
        else return false;
    }

    /**
     * insertLatest() ubacuje valute na datum koji je zabiljezen(timestamp) i tecaj valute
     *
     * @param string $code
     * @param date $date
     * @param float $rate
     */
    public static function insertLatest($code, $date, $rate)
    {
        $sql = "INSERT INTO rates(code, onDate, rate) VAlUES ('" . $code . "','" . $date . "', '" . $rate . "')";
        AppCore::getDB()->sendQuery($sql);
    }

    /**
     * updateLatest() funkcija ubacuje najnovije tecajeve u tablicu
     */
    public static function updateLatest()
    {
        $sql = "SELECT code FROM currency";
        $query = AppCore::getDB()->sendQuery($sql);

        $data = array();

        while ($row = $query->fetch_assoc()) {
            $data[] = $row;
        }

        $dbCode = array_column($data, 'code');
        $latestRates = apiHandle::latestRate();
        $onDate = date('Y-m-d', $latestRates['timestamp']);
        $dateNow = date_create()->format("Y-m-d");

        $sqlDate = "SELECT onDate FROM rates WHERE onDate = '" . $dateNow . "'";
        $queryDate = AppCore::getDB()->sendQuery($sqlDate);

        if (mysqli_num_rows($queryDate) > 1) {
            throw new Exception("Rates already updated");
        } else {
            foreach ($latestRates['rates'] as $key => $value) {
                foreach ($dbCode as $code) {
                    if ($key == $code) {
                        self::insertLatest($key, $onDate, $value);
                    }
                }
            }
        }
    }

    /**
     * getSelectedRate() klasa prima argument $code koji korisnik unese da mu se ispise
     *
     * @param string $code
     *
     * @return array $data
     */
    public static function getSelectedRate($code)
    {
        $sql = "SELECT code, rate FROM rates where code = ('" . $code . "') AND onDate = ('" . date("Y-m-d") . "')";

        $data = array();
        $query = AppCore::getDB()->sendQuery($sql);

        while ($row = $query->fetch_assoc()) {
            $data[] = $row;
        }

        return $data;
    }
}
