<?php
require(SYSTEM . 'model/AbstractPage.class.php');
require(SYSTEM . 'util/HistoryRateHandler.class.php');

class HistoryByDatePage extends AbstractPage
{

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