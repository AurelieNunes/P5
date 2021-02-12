<?php
namespace P5\model;

use \P5\model\Manager;

class SellerManager extends Manager 
{
    public function subscribeSeller($name,$siret, $mail, $pass)
    {
        $db = $this->dbConnect();
        $newSeller = $db->prepare('INSERT INTO seller (name,siret, mail, pass, subscribe_date) VALUES (?, ?, ?, ?, CURDATE())');
        $newSeller->execute(array($name, $siret, $mail, $pass));

        return $newSeller;
    }

    public function loginSeller($name)
    {
        $db = $this->dbConnect();
        $req = $db->prepare('SELECT id, pass FROM seller WHERE name = ?');
        $req->execute(array($name));
        $seller = $req->fetch();

        return $seller;
    }

    public function checkName($name)
    {
		$db = $this->dbConnect();
		$req = $db->prepare('SELECT name FROM seller WHERE name = ?');
		$req->execute(array($name));
		$nameSeller = $req->fetch();

		return $nameSeller;
	}

    public function checkMail($mail) {
		$db = $this->dbConnect();
		$req = $db->prepare('SELECT mail FROM seller WHERE mail = ?');
		$req->execute(array($mail));
		$mailSeller = $req->fetch();

		return $mailSeller;
	}

    public function checkSiret($siret)
    {
        $db= $this->dbConnect();
        $req = $db->prepare('SELECT siret FROM seller WHERE siret =?');
        $req->execute(array($siret));
        $siretCheck = $req->fetch();
        return $siretCheck;
    }
}