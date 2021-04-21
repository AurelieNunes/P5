<?php
namespace P5\model;

use \P5\model\Manager;

class SellerManager extends Manager 
{
    /**
     * Get All Sellers
     * @return array
     */
    public function allSellers(): array
    {
        // var_dump('DATABASE');
        // die();ok
        $db = $this->dbConnect();
        $req = $db->query('SELECT * FROM seller');
        $sellers = $req->fetchAll();
        // var_dump($sellers);
        // die();return plusieurs array
        return $sellers;
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
    public function checkMail(string $mail) 
    {
		$db = $this->dbConnect();
		$req = $db->prepare('SELECT mail FROM seller WHERE mail = ?');
		$req->execute(array($mail));
		$mailSeller = $req->fetch();

		return $mailSeller;
	}

    /**
     * Check siret number
     * @param int $siret
     * 
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

    /**
     * Get seller by id
     * @param int $sellerId
     * @return array
     */
    public function getSeller($sellerId): array
    {
        $db= $this->dbConnect();
        $req = $db->prepare('SELECT * FROM seller WHERE id = ?');
        $req->execute(array($sellerId));
        $seller = $req->fetch();

        return $seller;
    }

    /**
     * Return the name of one seller
     * @param int $sellerId
     * @return array
     */
    public function getSellerCompanyById(int $sellerId):array
    {
        $db= $this->dbConnect();
        $req = $db->prepare('SELECT company FROM seller WHERE id= ?');
        $req->execute(array($sellerId));

        $company = $req->fetch();        
        // var_dump($company);
        // die();
        return $company;
    }

    /**
     * Get Seller By Company
     */
    // public function getSellerByCompany(string $companyName)
    // {
    //     $db = $this->dbConnect();
    //     $req = $db->prepare('SELECT * FROM seller WHERE company=?');
    //     $req->execute(array($companyName));

    //     $companyName = $req->fetch();
    //     // var_dump($companyName);
    //     // die();
    //     return $companyName;
    // }

    /**
     * Login seller
     * @param string $mail
     * @return array
     */
    public function loginSeller(string $mail)
    {
        $db = $this->dbConnect();
        $req = $db->prepare('SELECT id, pass, isAdmin FROM seller WHERE mail = ?');
        $req->execute(array($mail));
        $seller = $req->fetch();
        // var_dump($seller);
        // die();
        return $seller;
    }

     /**
     * Get random Seller
     * @return array with 3 sellers random
     */
    public function randomSellers(): array
    {
        $db = $this->dbConnect();
        $req = $db-> query('SELECT * FROM seller ORDER BY rand() LIMIT 3');
        $randomSeller = $req->fetchAll();

        return $randomSeller;
    }

    /**
     * Add seller in DATABASE
     * @param string $company, $mail, $pass
     * @param int $siret
     * @return void
     */
    public function subscribeSeller(string $company, int $siret, string $mail, string $pass): void
    {
        $db = $this->dbConnect();
        $newSeller = $db->prepare('INSERT INTO seller (company, siret, mail, pass, subscribe_date, isAdmin) VALUES (?, ?, ?, ?, CURDATE(),0)');
        $newSeller->execute(array($company, $siret, $mail, $pass));
    }

    /**
     * Update seller info
     * @param string $addressSeller
     * @param string $citySeller
     * @param int $cpSeller
     * @param int $telSeller
     * @param int $sellerId
     */
    public function updateSeller(string $addressSeller, int $cpSeller, string $citySeller, int $telSeller, int $sellerId)
    {
        // var_dump('test db');
        // die();
        $db = $this->dbConnect();
        $req = $db->prepare('UPDATE seller SET addressSeller=?, cpSeller=?, citySeller=?, telSeller=? WHERE id=?');
        $req->execute(array($addressSeller, $cpSeller, $citySeller, $telSeller, $sellerId));
        $sellerUpdate = $req->fetch();
        // var_dump($sellerUpdate);
        // die();boolean false
        return $sellerUpdate;
    }

}