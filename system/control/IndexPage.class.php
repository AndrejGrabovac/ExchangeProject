<?php
class IndexPage extends AbstractPage
{
    function code()
    {
        $this->template = 'currency';

        $status = "
        Currency:" . "<br>"."
        http://localhost/ExchangeProject/index.php?page=Currency " . "<br>" . "
        " . "<br><br>" . "
        CRUD:" . "<br>"."
        http://localhost/ExchangeProject/index.php?page=ReadCurrencies " . "<br>" . "
        http://localhost/ExchangeProject/index.php?page=CreateCurrency&currency=EUR " . "<br>" . "
        http://localhost/ExchangeProject/index.php?page=ReadCurrency&currency=HRK " . "<br>" . "
        http://localhost/ExchangeProject/index.php?page=DeleteCurrency&currency=EUR " . "<br><br>" . "
        selected RATE and converter: " . "<br>"."
        http://localhost/ExchangeProject/index.php?page=SelectedRate&currencyCode=HRK " . "<br>" . "
        http://localhost/ExchangeProject/index.php?page=Convert&currencyOne=USD&currencyTwo=HRK&amount=950" . "<br>" . "
        <br><br>
        History: " . "<br>"."
        http://localhost/ExchangeProject/index.php?page=Rate " . "<br>" . "
        http://localhost/ExchangeProject/index.php?page=HistoryByDate&history=2022-09-15" . "<br>" . "
        http://localhost/ExchangeProject/index.php?page=History
        ";

        $this->v['var'] = $status;
    }
}
