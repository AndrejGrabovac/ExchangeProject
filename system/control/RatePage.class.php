<?php
require_once(SYSTEM . 'model/AbstractPage.class.php');
require(SYSTEM . 'util/RateHandler.class.php');

/**
 *Klasa RatePage obraduje sve tecajeve za valute u bazi podataka
 *
 * @author Andrej Grabovac
 */
class RatePage extends AbstractPage
{
    /**
     * code() provjerava ako ja baza prazna te ako nije prazna azurirat ce tecajeve na najnoviji datum iznad starih tecajeva
     * a ako je prazna ubacit ce nanjovije tecajeve
     */
    public function code()
    {
        $this->template = 'rate';
        if (RateHandler::checkIfEmpty()) {
            RateHandler::updateLatest();
            $status = "Rates downloaded";
            $this->v['var'] = $status;
        } else {
            RateHandler::updateLatest();
            $status = "Rates updated";
            $this->v['var'] = $status;
        }
    }
}