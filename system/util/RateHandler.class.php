<?php

require_once('ApiHandler.class.php');

class RateHandler
{
    public static function checkIfEmpty()
    {
        $sql = "SELECT * FROM rates";
        $query = AppCore::getDB()->sendQuery($sql);

        if (mysqli_num_rows($query) < 1) return true;
        else return false;
    }

    public static function insertLatest($code, $date, $rate)
    {
        $sql = "INSERT INTO rates(code, onDate, rate) VAlUES ('" . $code . "','" . $date . "', '" . $rate . "')";
        AppCore::getDB()->sendQuery($sql);
    }

    public static function updateLatest()
    {
        $sql = "SELECT code FROM currency";
        $query = AppCore::getDB()->sendQuery($sql);

        $fetchedData = array();

        while ($row = $query->fetch_assoc()) {
            $fetchedData[] = $row;
        }

        $dbCode = array_column($fetchedData, 'code');
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

    public static function getSelectedRate($code)
    {
        $sql = "SELECT code, rate FROM rates where code = ('" . $code . "') AND onDate = ('" . date("Y-m-d") . "')";

        $fetchedData = array();
        $query = AppCore::getDB()->sendQuery($sql);

        while ($row = $query->fetch_assoc()) {
            $fetchedData[] = $row;
        }

        return $fetchedData;
    }
}
