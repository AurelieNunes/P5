<?php
namespace P5\model;

class Manager
{
    //Fonction qui permet de ne pas répéter du code
    protected function dbConnect()
    {
        $db = new \PDO('mysql:host=localhost;dbname=p5;charset=utf8', 'root', '');
        return $db;
    }
}

?>