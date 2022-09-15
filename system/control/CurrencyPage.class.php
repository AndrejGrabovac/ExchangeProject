<?php
include(SYSTEM . 'util/CurrenciesHandler.class.php');
require_once(SYSTEM. 'model/AbstractPage.class.php');

/**
 * CurrencyPage klasa sluzi za obradu podataka iz api-a za valute
 *
 * @author Andrej Grabovac
 */

class CurrencyPage extends AbstractPage
{
    /**
     * pomocu code() funckije koja je implementirana iz abstract page unosimo sve valute iz apija
     * rezultati se salju u converter.tpl.php gdje se prikazuje
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
