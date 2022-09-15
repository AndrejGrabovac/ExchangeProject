<?php
require_once(SYSTEM . 'model/AbstractPage.class.php');
require(SYSTEM . 'util/ConverterHandler.class.php');
/**
 * @author Andrej Grabovac
 *
 * ConvertPage je klasa koja upravlja s konverzijom valuta
 */
class ConvertPage extends AbstractPage
{
    /**
     * funkcija code() iz AbstractPage pomocu get uzima valutu iz URL i iznos koji se treba konvertirati
     * te se rezultat salje u converter.tpl.php gdje se on prikazuje
     */
    public function code()
    {
        $currencyOne = $_GET['currencyOne'];
        $currencyTwo = $_GET['currencyTwo'];
        $amount = $_GET['amount'];

        $result = ConverterHandler::Convert($currencyOne, $currencyTwo, $amount);

        $this->template = 'converter';
        $this->v['var'] = $result;
    }
}