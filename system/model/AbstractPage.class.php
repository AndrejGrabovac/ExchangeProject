<?php

abstract class AbstractPage {

    function __construct() {
        $this->code();
        $this->show();
    }

    function show() {

        $v = $this->v ?? [];

        include(SYSTEM . 'view/' . $this-> template . '.tpl.php');
    }

    abstract function code();
}