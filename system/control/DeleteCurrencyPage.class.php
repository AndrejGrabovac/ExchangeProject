<?php
require_once(SYSTEM . 'model/AbstractPage.class.php');
require(SYSTEM . 'util/CurrenciesHandler.class.php');
require(SYSTEM . 'util/CurrencyCRUDHandler.class.php');

class DeleteCurrencyPage extends AbstractPage
{

    public function code()
    {
        $this->template = 'deletecurrency';
        $code = strtoupper($_GET['currency']);

        if (CurrencyCRUD::checkCurrency($code)) {
            CurrencyCRUD::deleteCurrency($code);
            $status = "Currency deleted";
            $this->v['var'] = $status;
        } else {
            $errorMsg = '' . $code . " Currency does not exist in crud_currency table";
            $this->v['var'] = $errorMsg;
        }
    }

}