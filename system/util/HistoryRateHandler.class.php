<?php
require_once('ApiHandler.class.php');

/**
 * HistoryRateHandler klasa sadrzi funkcijeza obradu povijesti tecajeva
 *
 * @author Andrej Grabovac
 */
class HistoryRateHandler
{
    /**
     * checkIfEmpty() funkcija provjerava da li je tablica prazna
     */
    static function checkIfEmpty()
    {
        $sql = "SELECT * FROM rates";
        $query = AppCore::getDB()->sendQuery($sql);

        if (mysqli_num_rows($query) < 1){
            return true;
        }else {
            return false;
        }
    }

    /**
     * searchByDate() funkcija sluzi za pretrazivanje baze podataka po odredenom datumu koji korisnik zeli
     *
     * @param Date $date
     *
     * @return array $rows
     * @return boolean
     */
    static function searchByDate($date)
    {
        $sql = "SELECT * FROM rates WHERE onDate = '" . $date . "' ";
        $query = AppCore::getDB()->sendQuery($sql);

        while ($row = $query->fetch_assoc()) {
            $rows[] = $row;
        }

        if (mysqli_num_rows($query) > 1){
            return $rows;
        }else{
            return false;
        }
    }

    /**
     * readHistory() funckija vraca sve iz rates tablice iz baze podataka
     *
     * @return array $rows
     * @return boolan
     */
    static function readHistory()
    {
        $sql = "SELECT * FROM rates";
        $query = AppCore::getDB()->sendQuery($sql);

        while ($row = $query->fetch_assoc()) {
            $rows[] = $row;
        }

        if (mysqli_num_rows($query) > 1) return $rows;
        else return false;
    }
}