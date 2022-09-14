<?php
class IndexPage extends AbstractPage
{
    function code()
    {
        $this->template = 'currency';

        $status = "
        http://localhost/PROJEKT.v1.4/index.php?page=Currency " . "<br>" . "
        " . "<br><br><br>" . "
        http://localhost/PROJEKT.v1.4/index.php?page=ReadCurrencies " . "<br>" . "
        http://localhost/PROJEKT.v1.4/index.php?page=CreateCurrency&.currency=EUR " . "<br>" . "
        http://localhost/PROJEKT.v1.4/index.php?page=ReadCurrency&.currency=EUR " . "<br>" . "
        http://localhost/PROJEKT.v1.4/index.php?page=DeleteCurrency&.currency=EUR " . "<br>" . "
        http://localhost/PROJEKT.v1.4/index.php?page=RateSelected&.currencyCode=EUR " . "<br>" . "
        http://localhost/PROJEKT.v1.4/index.php?page=Convert&.currencyOne=USD&.currencyTwo=EUR&.amount=500" . "<br>" . "
        <br><br>
        http://localhost/PROJEKT.v1.4/index.php?page=Rate " . "<br>" . "
        http://localhost/PROJEKT.v1.4/index.php?page=HistoryByDate&.history=2022-04-13" . "<br>" . "
        http://localhost/PROJEKT.v1.4/index.php?page=History
        ";

        $this->v['var'] = $status;
    }
}
