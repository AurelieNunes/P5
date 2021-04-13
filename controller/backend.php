<?php
use P5\model\CustomerManager;
use P5\model\SellerManager;
use P5\model\ItemsManager;
use P5\utils\Utils;

require_once './model/Manager.php';
require_once './utils/Utils.php';

function displayAdmin()
{
	// var_dump('test backend');
	// die();
    require 'view/backend/adminView.php';
}

function loginAdmin() 
{
    // var_dump('test controller');
    // die();
	if (isset($_POST['pass']) AND $_POST['pass'] == "admin") {
		header('Location: index.php?action=admin');
	} else {
		header('Location: index.php?action=admin-login-view&account-status=unsuccess-login');
	}
}

/**
 * Get All customers
 */
function manageAllCustomers(): void
{
	// var_dump('test');
	// die();
    $customerManager = new CustomerManager();
    $customer = $customerManager->getAllCustomers();
    // var_dump($customer);
    // die();
    require('view/backend/manageAllCustomersView.php');
}

/**
 * Get All items
 */
function manageAllItems(): void
{
	// var_dump('test');
	// die();
    $itemsManager = new ItemsManager();
    $item = $itemsManager->getAllItems();
    // var_dump($item);
    // die();
    require('view/backend/manageAllItemsView.php');
}

// /**
//  * Get All sellers
//  */
function manageAllSellers(): void
{
    // var_dump('test controller');
    // die();ok
    $sellerManager = new SellerManager();
    $allSellers = $sellerManager->allSellers();
    // var_dump($allSellers);
    // die(); //retourne plusieurs array
    require('view/backend/manageAllSellersView.php');
}

/**
 * Delete Account Customer
 * 
 */
function deleteCustomer($customerId)
{
	$customerManager = new CustomerManager();
	$deletedCustomer = $customerManager->deleteCustomer($customerId);
	$_SESSION = array();
	session_destroy();
	Header ('Location: index.php?action=manageCustomers&delete-account=success');
}

/**
 * Delete Account Seller
 * @param int $sellerId
 */
function deleteSeller(int $sellerId)
{
    $sellerManager = new SellerManager();
    $deletedSeller = $sellerManager->deleteSeller($sellerId);
    $_SESSION = array();
    session_destroy();

    Header ('Location: index.php?action=manageSellers&delete-account=success');
}

/**
 * Delete item by Id
 * @param int $itemId
 */
function deleteItemByAdmin(int $itemId): void
{
    $itemsManager = new ItemsManager();
    $deletedItem = $itemsManager->removeItem($itemId);

    Header('Location: index.php?action=admin&delete-item=success');
}
