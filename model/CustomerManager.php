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
     * Get all customers
     * 
     */
    public function getCustomers(): bool
    {
        $db = $this->dbConnect();
        $customers = $db->query('SELECT id, mail FROM customer');

        return $customers;
    }


     /**
     * Login customer
     * @param string $mail
     * @return array with mail customer
     */
    public function loginCustomer(string $mail): array
    {
        $db = $this->dbConnect();
        $req = $db->prepare('SELECT id, pass FROM customer WHERE mail = ?');
        $req->execute(array($mail));
        $customer = $req->fetch();

        return $customer;
    }

    /**
     * Add customer at DATABASE
     * @param string $lastName, $firstName, $maim, $pass
     */
    public function subscribeCustomer(string $lastName, string $firstName, string $mail, string $pass): void
    {
        $db = $this->dbConnect();
        $newCustomer = $db->prepare('INSERT INTO customer (lastName, firstName, mail, pass, subscribe_date) VALUES (?, ?, ?, ?, CURDATE())');
        $newCustomer->execute(array($lastName, $firstName, $mail, $pass));
    }
}
