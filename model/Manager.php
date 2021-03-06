<?php

namespace Blog\model;

use PDO;

// BDD connection
class Manager
{
    protected function dbConnect()
    {
        $db = new PDO('mysql:host=localhost;dbname=P42;charset=utf8', 'root', '', array(
            PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION
        ));
        return $db;
    }
}
