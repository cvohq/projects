<?php

namespace Controllers;

class Week5Controller extends Controller {
    public function __construct($param) {
        \Classes\Mysql::connect_db();
    }
}
