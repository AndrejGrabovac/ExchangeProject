<?php
include(SYSTEM . 'util/CurrenciesHandler.class.php');
require_once(SYSTEM. 'model/AbstractPage.class.php');

class CurrencyPage extends AbstractPage
{

    public function code()
    {
        $this->template = "currency";

        if (!CurrenciesHandler::checkAllCurrencies()) {
            CurrenciesHandler::insertCurrency();
            $status = "Currency added";
            $this->v['var'] = $status;
        } else {
            $errorMsg = "Currency already added";
            $this->v['var'] = $errorMsg;
        }
    }
}
