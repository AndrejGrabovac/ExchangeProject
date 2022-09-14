<?php
require(SYSTEM . 'model/AbstractPage.class.php');
require(SYSTEM . 'util/RateHandler.class.php');

class SelectedRatePage extends AbstractPage
{
    /**
     * pomocu GET uzima 3letter code iz URL-a te svom tpl.php file-u salje
     * sve podatke vezane za currency koji selektiramo
     */
    public function code()
    {
        $this->template = 'selectedrate';

        $currencyCode = $_GET['currencyCode'];

        $status = RateHandler::getSelectedRate($currencyCode);

        if (!empty($status)) {
            $this->v['var'] = json_encode($status);
        } else {
            $errorMsg = "No currency & rate with $currencyCode name";
            $this->v['var'] = $errorMsg;
        }
    }
}