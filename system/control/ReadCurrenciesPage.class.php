<?php
require(SYSTEM . 'util/CurrenciesHandler.class.php');
require(SYSTEM . 'util/CurrencyCRUDHandler.class.php');
require_once(SYSTEM . 'model/AbstractPage.class.php');

class ReadCurrenciesPage extends AbstractPage
{

    public function code()
    {
        $this->template = 'readcurrencies';

        $status = CurrencyCRUD::readAllCurrency();

        $this->v['var'] = json_encode($status);
    }
}