<?php
require_once(SYSTEM . 'model/AbstractPage.class.php');
require(SYSTEM . 'util/HistoryRateHandler.class.php');

/**
 * HistoryPage klasa koja ispisuje cijelu povijest tecajeva valuta iz baze
 *
 * @author Andrej Grabovac
 */

class HistoryPage extends AbstractPage
{
    /**
     * code() prvo provjerava ako je baza prazna u slucaju da je prazna salje se error message
     * u slucaju da je popunjena salje se cijela povijest
     */

    public function code()
    {
        $this->template = 'history';

        if (HistoryRateHandler::checkIfEmpty()) {
            $errorMsg = "History empty in database";
            $this->v['var'] = json_encode($errorMsg);
        } else {
            $status = HistoryRateHandler::readHistory();
            $this->v['var'] = json_encode($status);
        }
    }
}