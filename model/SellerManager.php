<?php
namespace P5\model;

use \P5\model\Manager;

class SellerManager extends Manager 
{
    public function subscribeSeller($company, $siret, $mail, $pass)
    {
        $db = $this->dbConnect();
        $newSeller = $db->prepare('INSERT INTO seller (company, siret, mail, pass, subscribe_date) VALUES (?, ?, ?, ?, CURDATE())');
        $newSeller->execute(array($company, $siret, $mail, $pass));

        return $newSeller;
    }

    public function loginSeller($mail)
    {
        $db = $this->dbConnect();
        $req = $db->prepare('SELECT id, pass FROM seller WHERE mail = ?');
        $req->execute(array($mail));
        $seller = $req->fetch();

        return $seller;
    }

    public function checkCompany($company)
    {
		$db = $this->dbConnect();
		$req = $db->prepare('SELECT company FROM seller WHERE company = ?');
		$req->execute(array($company));
		$companySeller = $req->fetch();

		return $companySeller;
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
        $req = $db->prepare('SELECT siret FROM seller WHERE siret = ?');
        $req->execute(array($siret));
        $siretCheck = $req->fetch();
        return $siretCheck;
    }

    public function getSeller($sellerId)
    {
        
        $db= $this->dbConnect();
        $req = $db->prepare('SELECT id, company, siret, mail, pass, DATE_FORMAT(subscribe_date, \'%d/%m/%Y à %Hh%imin%ss\') FROM seller WHERE id = ?');
        $req->execute(array($sellerId));
        $seller = $req->fetch();
        // var_dump($seller);
        // die();
        return $seller;
    }

    public function getSellers()
    {
        $db = $this->dbConnect();
        $sellers = $db->query('SELECT id, company from seller WHERE id = ?,company = ?');

        return $sellers;
    }

    public function deleteSeller($sellerId)
    {
        $db = $this->dbConnect();
        $req = $db->prepare('DELETE FROM seller WHERE id = ?');
        $deleteSeller = $req->execute((array($sellerId)));

        return $deleteSeller;
    }
}