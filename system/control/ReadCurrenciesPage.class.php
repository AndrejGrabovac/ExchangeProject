<?php
require(SYSTEM . 'util/CurrenciesHandler.class.php');
require(SYSTEM . 'util/CurrencyCRUDHandler.class.php');
require_once(SYSTEM . 'model/AbstractPage.class.php');

/**
 *ReadCurrenciesPage klasa za ispis svih valuta
 *
 * @author Andrej Grabovac
 */
class ReadCurrenciesPage extends AbstractPage
{
    /**
     * code() funckija poziva readAllCurrencies() koji cita sve valute
     */
    public function code()
    {
        $this->template = 'readcurrencies';

        $status = CurrencyCRUD::readAllCurrencies();

        $this->v['var'] = json_encode($status);
    }
}