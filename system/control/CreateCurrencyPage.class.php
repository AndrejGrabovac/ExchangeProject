<?php
require(SYSTEM . 'util/CurrenciesHandler.class.php');
require(SYSTEM . 'util/CurrencyCRUDHandler.class.php');
require_once(SYSTEM . 'model/AbstractPage.class.php');

/**
 * CreateCurrencyPage klasa sluzi za obradu valuta koje korisnik zeli kreirati
 *
 * @author Andrej Grabovac
 */
class CreateCurrencyPage extends AbstractPage
{
    /**
     * funkcija code() iz AbstractPage pomocu get uziuma skraceni zapis valute (tinker)
     * te se salje CurrencyCRUDHandleru te na kraju se rezultat salje createcurrency.tpl.php gdje se prikazuje
     */
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