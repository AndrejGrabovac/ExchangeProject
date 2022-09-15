<?php
require_once(SYSTEM . 'model/AbstractPage.class.php');
require(SYSTEM . 'util/HistoryRateHandler.class.php');


/**
 * HistoryByDate upravljamo povijesti valuta u bazi podataka
 *
 * @author Andrej Grabovac
 */
class HistoryByDatePage extends AbstractPage
{
    /**
     * funckija code() uzima datum pomocu get iz url-a te pozivamo HistoryRateHandler
     */
    public function code()
    {
        $this->template = 'historybydate';

        $date = $_GET['history'];

        $status = HistoryRateHandler::searchByDate($date);

        if (!empty($status)) {
            $this->v['var'] = json_encode($status);
        } else {
            $errorMsg = "No rates with $date date";
            $this->v['var'] = $errorMsg;
        }
    }
}