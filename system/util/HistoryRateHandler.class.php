<?php
require('ApiHandler.class.php');

class HistoryRateHandler
{
    static function checkIfEmpty()
    {
        $sql = "SELECT * FROM rates";
        $query = AppCore::getDB()->sendQuery($sql);

        if (mysqli_num_rows($query) < 1) return true;
        else return false;
    }

    static function searchByDate($date)
    {
        $sql = "SELECT * FROM rates WHERE onDate = '" . $date . "' ";
        $query = AppCore::getDB()->sendQuery($sql);

        while ($row = $query->fetch_assoc()) {
            $rows[] = $row;
        }

        if (mysqli_num_rows($query) > 1) return $rows;
        else return false;
    }

    static function readHistory()
    {
        $sql = "SELECT * FROM rates";
        $query = AppCore::getDB()->sendQuery($sql);

        while ($row = $query->fetch_assoc()) {
            $rows[] = $row;
        }

        if (mysqli_num_rows($query) > 1) return $rows;
        else return false;
    }
}