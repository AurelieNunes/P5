<?php
namespace P5\model;

use \P5\model\Manager;

class CustomerManager extends Manager 
{

    public function subscribeCustomer($lastName, $firstName, $mail, $pass)
    {
        $db = $this->dbConnect();
        $newCustomer = $db->prepare('INSERT INTO customer (lastName, firstName, mail, pass, subscribe_date) VALUES (?, ?, ?, ?, CURDATE())');
        $newCustomer->execute(array($lastName, $firstName, $mail, $pass));

        return $newCustomer;
    }

    public function loginCustomer($mail)
    {
        $db = $this->dbConnect();
        $req = $db->prepare('SELECT id, pass FROM customer WHERE mail = ?');
        $req->execute(array($mail));
        $customer = $req->fetch();

        return $customer;
    }

    public function checkLastName($lastName) 
    {
		$db = $this->dbConnect();
		$req = $db->prepare('SELECT lastName FROM customer WHERE lastName = ?');
		$req->execute(array($lastName));
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
