<?php
require_once(SYSTEM . 'model/AbstractPage.class.php');
require(SYSTEM . 'util/HistoryRateHandler.class.php');

class HistoryPage extends AbstractPage
{

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