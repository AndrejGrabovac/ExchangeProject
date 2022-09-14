<?php
class IndexPage extends AbstractPage
{
    function code()
    {
        $this->template = 'currency';

        $status = "
        http://localhost/ExchangeProject/index.php?page=Currency " . "<br>" . "
        " . "<br><br><br>" . "
        http://localhost/ExchangeProject/index.php?page=ReadCurrencies " . "<br>" . "
        http://localhost/ExchangeProject/index.php?page=CreateCurrency&.currency=EUR " . "<br>" . "
        http://localhost/ExchangeProject/index.php?page=ReadCurrency&.currency=EUR " . "<br>" . "
        http://localhost/ExchangeProject/index.php?page=DeleteCurrency&.currency=EUR " . "<br>" . "
        http://localhost/ExchangeProject/index.php?page=RateSelected&.currencyCode=EUR " . "<br>" . "
        http://localhost/ExchangeProject/index.php?page=Convert&.currencyOne=USD&.currencyTwo=EUR&.amount=500" . "<br>" . "
        <br><br>
        http://localhost/ExchangeProject/index.php?page=Rate " . "<br>" . "
        http://localhost/ExchangeProject/index.php?page=HistoryByDate&.history=2022-04-13" . "<br>" . "
        http://localhost/ExchangeProject/index.php?page=History
        ";

        $this->v['var'] = $status;
    }
}
