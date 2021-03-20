<?php
namespace P5\model;

use \P5\model\Manager;

class SellerManager extends Manager 
{
    /**
     * Add seller in DATABASE
     * @param string/int $company,$siret, $mail, $pass
     */
    public function subscribeSeller(string $company, int $siret, string $mail, string $pass): void
    {
        $db = $this->dbConnect();
        $newSeller = $db->prepare('INSERT INTO seller (company, siret, mail, pass, subscribe_date) VALUES (?, ?, ?, ?, CURDATE())');
        $newSeller->execute(array($company, $siret, $mail, $pass));
    }

    /**
     * Get seller
     * @param string $mail
     * @return array
     */
    public function loginSeller(string $mail): array
    {
        $db = $this->dbConnect();
        $req = $db->prepare('SELECT id, pass FROM seller WHERE mail = ?');
        $req->execute(array($mail));
        $seller = $req->fetch();

        return $seller;
    }

    /**
     * Check company name seller
     * @param string $company
     * @return
     */
    public function checkCompany(string $company)
    {
		$db = $this->dbConnect();
		$req = $db->prepare('SELECT company FROM seller WHERE company = ?');
		$req->execute(array($company));
		$companySeller = $req->fetch();

		return $companySeller;
	}

    /**
     * Check mail seller
     * @param string $mail
     * @return
     */
    public function checkMail(string $mail) {
		$db = $this->dbConnect();
		$req = $db->prepare('SELECT mail FROM seller WHERE mail = ?');
		$req->execute(array($mail));
		$mailSeller = $req->fetch();

		return $mailSeller;
	}

    /**
     * check siret number
     * @param int $siret
     * @return 
     */
    public function checkSiret(int $siret)
    {
        $db= $this->dbConnect();
        $req = $db->prepare('SELECT siret FROM seller WHERE siret = ?');
        $req->execute(array($siret));
        $siretCheck = $req->fetch();
        return $siretCheck;
    }

    /**
     * Get seller by id
     * @param int $sellerId
     * @return array
     */
    public function getSeller(int $sellerId): array
    {
        $db= $this->dbConnect();
        $req = $db->prepare('SELECT id, company, siret, mail, pass, DATE_FORMAT(subscribe_date, \'%d/%m/%Y à %Hh%imin%ss\') FROM seller WHERE id = ?');
        $req->execute(array($sellerId));
        $seller = $req->fetch();
        // var_dump($seller);
        // die();
        return $seller;
    }

    /*
     * Delete seller by id
     * @param int $sellerId
     */
    public function deleteSeller(int $sellerId)
    {
        $db = $this->dbConnect();
        $req = $db->prepare('DELETE FROM seller WHERE id = ?');
        $deleteSeller = $req->execute((array($sellerId)));

        return $deleteSeller;
    }
}