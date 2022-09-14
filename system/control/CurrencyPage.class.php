<?php
include(SYSTEM . 'util/CurrenciesHandler.class.php');
include(SYSTEM. 'model/AbstractPage.class.php');

class CurrencyPage extends AbstractPage
{
    /**
     * code() implementirana funkcija iz AbstractPage-a, unosi sve currencies iz API-a
     * rezultat se salje u coverter.tpl.php gdje se prikazuje
     */
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
