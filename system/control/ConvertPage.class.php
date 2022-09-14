<?php
require(SYSTEM . 'model/AbstractPage.class.php');
require(SYSTEM . 'util/ConverterHandler.class.php');

class ConvertPage extends AbstractPage
{

    public function code()
    {
        $currencyOne = $_GET['currencyOne'];
        $currencyTwo = $_GET['currencyTwo'];
        $amount = $_GET['amount'];

        $result = ConverterHandler::Convert($currencyOne, $currencyTwo, $amount);

        $this->template = 'converter';
        $this->v['var'] = $result;
    }
}