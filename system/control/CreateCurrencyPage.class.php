<?php
require(SYSTEM . 'util/CurrenciesHandler.class.php');
require(SYSTEM . 'util/CurrencyCRUDHandler.class.php');
require_once(SYSTEM . 'model/AbstractPage.class.php');

class CreateCurrencyPage extends AbstractPage
{
    public function code()
    {
        $this->template = 'createcurrency';
        $currency = strtoupper($_GET['currency']);

        if (!CurrencyCRUD::checkCurrency($currency)) {
            CurrencyCRUD::createCurrency($currency);
            $status = "Currency created";
            $this->v['var'] = $status;
        } else {
            $status = "Currency exists";
            $this->v['var'] = $status;
        }
    }
}