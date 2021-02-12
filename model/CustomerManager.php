<?php

namespace P5\model;

use \P5\model\Manager;

class CustomerManager extends Manager 
{
    public function subscribeCustomer($pseudo,$mail,$pass)
    {
        $db = $this->dbConnect();
        $newCustomer = $db->prepare('INSERT INTO customer (pseudo, mail, pass, subscribe_date) VALUES (?, ?, ?, CURDATE())');
        $newCustomer->execute(array($pseudo, $mail, $pass));

        return $newCustomer;
    }

    public function loginCustomer($pseudo)
    {
        $db = $this->dbConnect();
        $req = $db->prepare('SELECT id, pass FROM customer WHERE pseudo = ?');
        $req->execute(array($pseudo));
        $customer = $req->fetch();

        return $customer;
    }

    public function checkPseudo($pseudo) 
    {
		$db = $this->dbConnect();
		$req = $db->prepare('SELECT pseudo FROM customer WHERE pseudo = ?');
		$req->execute(array($pseudo));
		$usernameValidity = $req->fetch();

		return $usernameValidity;
	}

	public function checkMail($mail) {
		$db = $this->dbConnect();
		$req = $db->prepare('SELECT mail FROM customer WHERE mail = ?');
		$req->execute(array($mail));
		$mailValidity = $req->fetch();

		return $mailValidity;
	}

}
