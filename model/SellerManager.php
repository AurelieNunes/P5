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
        $db = $this->dbConnect();
        $req = $db->query('SELECT * FROM seller');
        $sellers = $req->fetchAll();
        
        return $sellers;
    }

    /**
     * Check company name seller
     * @param string $company
     * @return array
     */
    public function checkCompany(string $company): array
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
     * @return array
     */
    public function checkMail(string $mail): array
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
     * @return array
     */
    public function checkSiret(int $siret): array
    {
        $db = $this->dbConnect();
        $req = $db->prepare('SELECT siret FROM seller WHERE siret = ?');
        $req->execute(array($siret));
        $siretCheck = $req->fetch();

        return $siretCheck;
    }

    /**
     * Delete seller by id
     * @param int $sellerId
     */
    public function deleteSeller(int $sellerId): void
    {
        $db = $this->dbConnect();
        $req = $db->prepare('DELETE FROM seller WHERE id = ?');
        $deleteSeller = $req->execute((array($sellerId)));
    }

    /**
     * Get seller by id
     * @param int $sellerId
     * @return array
     */
    public function getSeller($sellerId): array
    {
        $db = $this->dbConnect();
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
    public function getSellerCompanyById(int $sellerId): array
    {
        $db = $this->dbConnect();
        $req = $db->prepare('SELECT company FROM seller WHERE id= ?');
        $req->execute(array($sellerId));

        $company = $req->fetch();
        // var_dump($company);
        // die();
        return $company;
    }

    /**
     * Login seller
     * @param string $mail
     * @return array
     */
    public function loginSeller(string $mail): array
    {
        $db = $this->dbConnect();
        $req = $db->prepare('SELECT id, pass, isAdmin FROM seller WHERE mail = ?');
        $req->execute(array($mail));
        $seller = $req->fetch();
        // // var_dump($seller);
        // // die();
        return $seller;
    }

    /**
     * Get random Seller
     * @return array with 3 sellers random
     */
    public function randomSellers(): array
    {
        $db = $this->dbConnect();
        $req = $db->query('SELECT * FROM seller ORDER BY rand() LIMIT 3');
        $randomSeller = $req->fetchAll();

        return $randomSeller;
    }

    /**
     * Add seller in DATABASE
     * @param string $company, 
     * @param string $mail
     * @param string $pass
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
     * @param string $descriptionShop
     * @param int $cpSeller
     * @param int $telSeller
     * @param int $sellerId
     * @return boolean
     */
    public function updateSeller(string $addressSeller, string $cpSeller, string $citySeller, int $telSeller, string $descriptionShop, int $sellerId): bool
    {
        $db = $this->dbConnect();
        $req = $db->prepare('UPDATE seller SET addressSeller=?, cpSeller=?, citySeller=?, telSeller=?, descriptionShop=? WHERE id=?');
        $req->execute(array($addressSeller, $cpSeller, $citySeller, $telSeller, $descriptionShop, $sellerId));
        $sellerUpdate = $req->fetch();

        return $sellerUpdate;
    }
}
