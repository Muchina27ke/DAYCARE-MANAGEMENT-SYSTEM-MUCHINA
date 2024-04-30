<?php

class connection
{

    static public function connect()
    {

        $pdo = new PDO('mysql:host=localhost;dbname=swiss_db;', 'root', '');

        $pdo->exec('set names utf8');

        return $pdo;
    }
}
