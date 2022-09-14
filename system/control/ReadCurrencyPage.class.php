<?php
require(SYSTEM . 'util/CurrenciesHandler.class.php');
require(SYSTEM . 'util/CurrencyCRUDHandler.class.php');
require(SYSTEM . 'model/AbstractPage.class.php');

class ReadCurrencyPage extends AbstractPage
{

    public function code()
    {
        $this->template = 'readcurrency';

        $currencyCode = $_GET['currency'];
        $status = CurrencyCRUD::getCurrency($currencyCode);

        if (!empty($status)) {
            $this->v['var'] = json_encode($status);
        } else {
            $errorMsg = "No currency with $currencyCode name";
            $this->v['var'] = $errorMsg;
        }
    }
}