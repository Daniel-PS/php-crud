<?php

namespace App;

use PDO;

class Connection
{
    public static function make()
    {
        return new PDO('mysql:dbname=saints;host=localhost', 'root', '');
    }
}