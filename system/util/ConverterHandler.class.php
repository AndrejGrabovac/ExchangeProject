<?php
require('ApiHandler.class.php');

class ConverterHandler
{
    public static function Convert($currencyOne, $currencyTwo, $amount)
    {
        $sql = "SELECT rate FROM rates WHERE code = '" . $currencyOne . "'";
        $rateOne = AppCore::getDB()->sendQuery($sql);

        $sql = "SELECT rate FROM rates WHERE code = '" . $currencyTwo . "'";
        $rateTwo = AppCore::getDB()->sendQuery($sql);

        $rowsOne = [];
        $rowsTwo = [];

        if ($currencyOne == "USD") {
            while ($row =  $rateTwo->fetch_assoc()) {
                $rowsTwo[] = $row;
            }
            foreach ($rowsTwo['0'] as $key => $value) {
                $rateTwo = floatval($value);
            }
            $amountDollar = (1.0 / 1.0) * (float)$amount;
            $convertedAmount = $amountDollar *  (float)$rateTwo;
        } else if ($currencyTwo == "USD") {
            while ($row =  $rateOne->fetch_assoc()) {
                $rowsOne[] = $row;
            }
            foreach ($rowsOne['0'] as $key => $value) {
                $rateOne = floatval($value);
            }
            $amountDollar = (1.0 / (float)$rateOne) * (float)$amount;
            $convertedAmount = $amountDollar *  1;
        } else {
            while ($row =  $rateOne->fetch_assoc()) {
                $rowsOne[] = $row;
            }
            while ($row =  $rateTwo->fetch_assoc()) {
                $rowsTwo[] = $row;
            }
            foreach ($rowsOne['0'] as $key => $value) {
                $rateOne = floatval($value);
            }
            foreach ($rowsTwo['0'] as $key => $value) {
                $rateTwo = floatval($value);
            }
            $amountDollar = (1.0 / (float)$rateOne) * (float)$amount;
            $convertedAmount = $amountDollar *  (float)$rateTwo;
        }

        return $convertedAmount;
    }
}
