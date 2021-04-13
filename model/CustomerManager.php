<?php
namespace P5\model;

use \P5\model\Manager;

class CustomerManager extends Manager 
{
    /**
     * Check last name customer
     * @param string $lastName
     * @return bool
     */
    public function checkLastName(string $lastName): bool
    {
		$db = $this->dbConnect();
		$req = $db->prepare('SELECT lastName FROM customer WHERE lastName = ?');
		$req->execute(array($lastName));
		$usernameValidity = $req->fetch();

        return $usernameValidity;
	}

    /**
     * Check mail customer
     * @param string $mail
     * @return bool
     */
	public function checkMail(string $mail): bool
    {
		$db = $this->dbConnect();
		$req = $db->prepare('SELECT mail FROM customer WHERE mail = ?');
		$req->execute(array($mail));
		$mailValidity = $req->fetch();

		return $mailValidity;
	}

    /**
     * Delete customer
     * @param int
     */
    public function deleteCustomer(int $customerId)
    {
        $db = $this->dbConnect();
        $req = $db->prepare('DELETE FROM customer WHERE id =?');
        $deletedCustomer = $req->execute(array($customerId));

        return $deletedCustomer;
    }

    /**
     * Get All customers
     * @return array
     */
    public function getAllCustomers(): array
    {
        $db = $this->dbConnect();
        $req = $db->query('SELECT * FROM customer');
        $customers = $req->fetchAll();
        // var_dump($customers);
        // die();

        return $customers;
    }

    /**
     * Get customer by id
     * @param int $customerId
     * @return array
     */
    public function getCustomer(int $customerId): array
    {
        // var_dump('db test');
        // die();
        $db = $this->dbConnect();
        $req = $db->prepare('SELECT id, lastName, firstName,addressCustomer, cpCustomer, cityCustomer, telCustomer, mail, pass FROM customer WHERE id=?');
        $req->execute(array($customerId));
        $customer = $req->fetch();
        // var_dump($customer);
        // die();
        return $customer;
    }

     /**
     * Login customer
     * @param string $mail
     * @return array with mail customer
     */
    public function loginCustomer(string $mail)
    {
        $db = $this->dbConnect();
        $req = $db->prepare('SELECT id, pass FROM customer WHERE mail = ?');
        $req->execute(array($mail));
        $customer = $req->fetch();

        return $customer;
    }

    /**
     * Add customer at DATABASE
     * @param string $lastName
     * @param string $firstName
     * @param string $mail
     * @param string $pass
     * @return void
     */
    public function subscribeCustomer(string $lastName, string $firstName, string $mail, string $pass): void
    {
        $db = $this->dbConnect();
        $newCustomer = $db->prepare('INSERT INTO customer (lastName, firstName, mail, pass, subscribe_date) VALUES (?, ?, ?, ?, CURDATE())');
        $newCustomer->execute(array($lastName, $firstName, $mail, $pass));
    }

    /**
     * Update info customer
     * @param string $addressCustomer
     * @param string $cityCustomer
     * @param int $cpCustomer
     * @param int $telCustomer
     * @param int $customerId
     */
    public function updateCustomer(string $addressCustomer,int $cpCustomer, string $cityCustomer, int $telCustomer, int $customerId)
    {
        // var_dump('test db');
        // die();
        $db = $this->dbConnect();
        $req = $db->prepare('UPDATE customer SET addressCustomer=?, cpCustomer=?, cityCustomer=?, telCustomer=? WHERE id=?');
        $req->execute(array($addressCustomer, $cpCustomer, $cityCustomer, $telCustomer, $customerId));
        $customerUpdate = $req->fetch();

        return $customerUpdate;
    }
}
