<?php
require(SYSTEM . 'model/AbstractPage.class.php');
require(SYSTEM . 'util/ConverterHandler.class.php');

class ConvertPage extends AbstractPage
{
    /**
     * code() implementirana funkcija iz AbstractPage-a pomocu GET-a uzima currency imena iz URL i iznos koji se konvertira
     * rezultat se salje u coverter.tpl.php gdje se prikazuje
     */
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