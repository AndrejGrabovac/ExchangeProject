<?php
require_once(SYSTEM . 'model/AbstractPage.class.php');
require(SYSTEM . 'util/RateHandler.class.php');

/**
 *  SelectedRatePage klasa sluzi za obradu odabrane value
 *
 * @author Andrej Grabovac
 */
class SelectedRatePage extends AbstractPage
{

    /**
     * pomocu get uzimamo tinker iz url te saljemo u tpl.php file gdje ga prikazuijemo
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