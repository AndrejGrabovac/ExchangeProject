<?php
require(SYSTEM . 'util/CurrenciesHandler.class.php');
require(SYSTEM . 'util/CurrencyCRUDHandler.class.php');
require_once(SYSTEM . 'model/AbstractPage.class.php');

/**
 * ReadCurrencyPage klasa sluzi za ispis odredene valute koji korisnik odabere
 *
 * @author Andrej Grabovac
 */
class ReadCurrencyPage extends AbstractPage
{
    /**
     * code() funkcija prikazuje tu odredenu valutu koju je korisnik unio
     */
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