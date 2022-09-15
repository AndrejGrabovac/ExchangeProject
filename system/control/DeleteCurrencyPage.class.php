<?php
require_once(SYSTEM . 'model/AbstractPage.class.php');
require(SYSTEM . 'util/CurrenciesHandler.class.php');
require(SYSTEM . 'util/CurrencyCRUDHandler.class.php');


/**
 * DeleteCurrencyPage sluzi za brisanje odredene valute
 *
 * @author Andrej Grabovac
 */
class DeleteCurrencyPage extends AbstractPage
{
    /**
     *prvo provjeravamo postoji li valuta ako postoji brisemo ga iz tablice ako ne postoji saljemo error message koji se prikazuje na deletecurrrency.tpl.php
     */
    public function code()
    {
        $this->template = 'deletecurrency';
        $code = strtoupper($_GET['currency']);

        if (CurrencyCRUD::checkCurrency($code)) {
            CurrencyCRUD::deleteCurrency($code);
            $status = "Currency deleted";
            $this->v['var'] = $status;
        } else {
            $errorMsg = '' . $code . " Currency does not exist in table";
            $this->v['var'] = $errorMsg;
        }
    }

}