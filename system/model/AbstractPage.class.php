<?php
/**
 * AbstractPage je abstraktna klasa koju svi kontroleri nasljeduju
 *
 * @author Andrej Grabovac
 */
abstract class AbstractPage
{
    /**
     * u konstruktoru pozivamo show() i code() funkcije
     */
    function __construct() {
        $this->code();
        $this->show();
    }

    /**
     * show() funkcoja printa elemetne koje kontroler proslijedi
     */
    function show() {

        $v = $this->v ?? [];

        include(SYSTEM . 'view/' . $this-> template . '.tpl.php');
    }

    /**
     * code() funkcijuu nasljeduju svi koji nasljeduju AbstractPage te je implementiraju
     */
    abstract function code();
}