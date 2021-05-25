<?php
namespace P5\model;
class Manager
{
    protected function dbConnect()
    {
        $db = new \PDO('mysql:host=db5002476520.hosting-data.io;dbname=dbs1973700;charset=utf8', 'dbu487326', 'zgW:SqsRQ6S.pE3');
        return $db;
    }
}
?>