<?php

use P5\model\CustomerManager;
use P5\model\SellerManager;
use P5\model\ItemsManager;

require_once './model/Manager.php';
require_once './utils/Utils.php';

/**
 * Delete Account Customer
 * @param int $customerId
 * 
 */
function deleteCustomer(int $customerId)
{
    $customerManager = new CustomerManager();
    $deletedCustomer = $customerManager->deleteCustomer($customerId);
    $_SESSION = array();
    session_destroy();
    Header('Location: index.php?action=manageCustomers&delete-account=success');
}

/**
 * Delete item by Id
 * @param int $itemId
 * @return void
 */
function deleteItemByAdmin(int $itemId): void
{
    $itemsManager = new ItemsManager();
    $deletedItem = $itemsManager->removeItem($itemId);

    Header('Location: index.php?action=admin&delete-item=success');
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

    Header('Location: index.php?action=manageSellers&delete-account=success');
}

function displayAdmin()
{
    require 'view/backend/adminView.php';
}

function loginAdmin()
{
    if (isset($_POST['pass']) and $_POST['pass'] == "admin") {
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
    $customerManager = new CustomerManager();
    $customer = $customerManager->getAllCustomers();

    require('view/backend/manageAllCustomersView.php');
}

/**
 * Get All items
 */
function manageAllItems(): void
{
    $itemsManager = new ItemsManager();
    $item = $itemsManager->getAllItems();

    require('view/backend/manageAllItemsView.php');
}

/**
 * Get All sellers
 *
 */
function manageAllSellers(): void
{
    $sellerManager = new SellerManager();
    $allSellers = $sellerManager->allSellers();  

    require('view/backend/manageAllSellersView.php');
}
