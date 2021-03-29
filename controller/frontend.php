<?php

use P5\model\CustomerManager;
use P5\model\SellerManager;
use P5\model\ItemsManager;
use P5\utils\Utils;

require_once './model/Manager.php';
require_once './utils/Utils.php';

function displayCreateItem()
{
    require 'view/frontend/seller/createItemSellerView.php';
}

function displayDashboardSeller()
{
    require 'view/frontend/seller/dashboardSellerView.php';
}

function displayLogin()
{
    require('view/frontend/common/loginView.php');
}

function displaySubscribe()
{
    require('view/frontend/common/subscribeView.php');
}

/**
 * Add Customer
 * @param string $lastName, $firstName, $mail, $pass
 */
function addCustomer(string $lastName, string $firstName, string $mail, string $pass): void
{

    $customerManager = new CustomerManager();

    $usernameValidity = $customerManager->checkLastName($lastName);
    $mailValidity = $customerManager->checkMail($mail);

    if ($usernameValidity) {
        Header('Location: index.php?action=subscribe&error=invalidUsername');
    }

    if ($mailValidity) {
        Header('Location: index.php?action=subscribe&error=invalidMail');
    }

    if (!$usernameValidity && !$mailValidity) {
        // Hachage du mot de passe
        $pass = password_hash($_POST['passCustomer'], PASSWORD_DEFAULT);
        $newCustomer = $customerManager->subscribeCustomer($lastName, $firstName, $mail, $pass);
        $newCustomer;

        // redirige vers page d'accueil avec le nouveau paramètre
        Header('Location: index.php?account-status=account-successfully-created');
    }
}

/**
 * Add seller
 * @param string $company, $mail, $pass
 * @param int $siret
 */
function addSeller(string $company, int $siret, string $mail, string $pass): void
{
    $sellerManager = new SellerManager();

    $companySellerCheck = $sellerManager->checkCompany($company);
    $siretSellerCheck = $sellerManager->checkSiret($siret);
    $mailSellerCheck = $sellerManager->checkMail($mail);


    if ($companySellerCheck) {
        Header('Location: index.php?action=subscribe&error=invalidUsername');
    }

    if ($siretSellerCheck) {
        Header('Location:index.php?action=subscribe&error=invalidSiret');
    }

    if ($mailSellerCheck) {
        Header('Location: index.php?action=subscribe&error=invalidMail');
    }

    if (!$companySellerCheck && !$siretSellerCheck && !$mailSellerCheck) {
        // Hachage du mot de passe
        $pass = password_hash($_POST['passSeller'], PASSWORD_DEFAULT);
        $newSeller = $sellerManager->subscribeSeller($company, $siret, $mail, $pass);
        $newSeller;
        // var_dump($newSeller);
        // die;
        // redirige vers page d'accueil avec le nouveau paramètre

        Header('Location: index.php?action=dashboardSeller');
    }
}

/**
 * Delete item by Id
 * @param int $itemId
 */
function deleteItem(int $itemId): void
{
    $itemsManager = new ItemsManager();
    $deletedItem = $itemsManager->removeItem($itemId);

    Header('Location: index.php?action=dashboardSeller&delete-item=success');
}

/**
 * Update Item
 */
function displayUpdate(): void
{
    // var_dump('testDisplay');
    // die(); ok
    $itemsManager = new ItemsManager();
    $item = $itemsManager->getItem($_GET['id']);
    // var_dump($item);
    // die();
    require('view/frontend/seller/updateItemView.php');
}

/**
 * Display update Seller account
 */
function displayUpdateSeller()
{
    $sellerManager = new SellerManager();
    $seller = $sellerManager->getSeller($_SESSION['id']);
    // var_dump($seller);
    // die();boolean false
    require('view/frontend/seller/updateSellerView.php');
}

/**
 * Is looking if the ref given as parametere already exist in the DATABASE. Return true if dont exist.
 * @param string $ref
 * @return bool
 */
function isUniqueRef(string $ref): bool
{
    $itemsManager = new ItemsManager();
    $allRefs = $itemsManager->getAllRef();

    foreach ($allRefs as $refDB) {
        if ($refDB[0] === $ref) {
            return false;
        }
    }
    return true;
}

/**
 * Get item by id
 */
function getItemId(): void
{
    $itemsManager = new ItemsManager();
    $item = $itemsManager->getItem($_GET['id']);
    // var_dump($item);
    // die();
    require('view/frontend/seller/itemView.php');
}

/**
 * Get all items by seller
 */
function getItemsSellerId(): void
{
    $itemsManager = new ItemsManager();
    $sellerManager = new SellerManager();
    $items = $itemsManager->getItemsSeller($_SESSION['id']);
    // var_dump($items);
    // die();
    if ($items) {
        $seller = $sellerManager->getSeller($_SESSION['id']);
        // var_dump($seller);
        // die();
    } else {
        Header('Location : index.php?=dashboardSeller');
    }
    require('view/frontend/seller/listItemsView.php');
}

// function getSellerbyId()
// {
//     $sellerManager = new SellerManager();
//     $sellerbyId =$sellerManager->getSeller($_SESSION['id']);

//     require('view/frontend/seller/updateSellerView.php');

// }

/**
 * Submit login customer
 * @param string $mail, $pass
 */
function loginSubmitCustomer(string $mail, string $pass): void
{

    $customerManager = new CustomerManager();
    $customer = $customerManager->loginCustomer($mail);

    $isPasswordCorrect = password_verify($_POST['passSubmitCustomer'], $customer['pass']);

    if (!$customer) {
        Header('Location: index.php?action=login&account-status=unsuccess-login');
    } else {
        if ($isPasswordCorrect) {
            $_SESSION['id'] = $customer['id'];
            $_SESSION['mailSubmitCustomer'] = ucfirst(strtolower($mail));
            Header('Location: index.php');
        } else {
            Header('Location: index.php?action=login&account-status=unsuccess-login');
        }
    }
}

/**
 * Submit login seller
 * @param string $mail, $pass
 */
function loginSubmitSeller(string $mail, string $pass): void
{
    $sellerManager = new SellerManager();
    $seller = $sellerManager->loginSeller($mail);

    $isPasswordCorrect = password_verify($_POST['passSubmitSeller'], $seller['pass']);

    if (!$seller) {
        Header('Location: index.php?action=login&account-status=unsuccess-login');
    } else {
        if ($isPasswordCorrect) {
            $_SESSION['id'] = $seller['id'];
            $_SESSION['mailSubmitSeller'] = ucfirst(strtolower($mail));
            Header('Location: index.php?action=dashboardSeller');
        } else {
            Header('Location: index.php?action=login&account-status=unsuccess-login');
        }
    }
}

/**
 * Logout
 */
function logout(): void
{
    $_SESSION = array();
    session_destroy();

    Header('Location: index.php?logout=success');
}

/**
 * New item
 * @param int $id_seller, $price, $stock
 * @param string $ref, $nameItem, $descriptionItem, $size
 */
function newItem(int $id_seller, string $ref, string $nameItem, string $descriptionItem, int $price, string $size, int $stock): void
{
    // ETAPE 1 CONTROL DE L'ARTICLE
    // ARTICLE PAS VIDE
    // VERIFICATION ARTICLE UNIQUE

    // ETAPE 2 GESTION DE L'IMAGE
    // SOUS ETAPE 1 VERIFICATION
    // VERIFICATION PAS VIDE
    // VERIFICATION PAS TROP GROSSE
    // VERIFICATION FORMAT SUPPORTER
    // SOUS ETAPE 2
    // UPLOAD DE L'IMAGE
    // RECUPERATION DE L'URL

    // ETAPE 3 AJOUTS EN BDD
    // SOUS ETAPE 1
    // RECUPERATION ID VENDEUR
    // AJOUTS A LA BDD
    $utils = new Utils();
    if (!$utils->isEmpty([$ref, $nameItem, $descriptionItem, $price, $size, $stock])) {
        if (!isUniqueRef($ref)) {
            throw new Error('Ref déjà existante');
        }
        if (!empty($_FILES)) {
            if ($_FILES['picture']['size'] !== 0) {
                $extension = explode('/', $_FILES['picture']['type'])[1];
                if ($extension === 'jpg' || $extension === 'jpeg' || $extension === 'png') {
                    if ($_FILES['picture']['size'] < 1000000) {
                        $name = $_FILES['picture']['name'];
                        $tmp_name = $_FILES['picture']['tmp_name'];
                        $path = 'assets/pictures/' . $name;

                        move_uploaded_file($tmp_name, $path);
                        $itemsManager = new ItemsManager();
                        $itemsManager->createItem($id_seller, $ref, $nameItem, $descriptionItem, $price, $size, $stock, $path);

                        Header('Location: index.php?action=dashboardSeller&new-item=success');
                    } else {
                        throw new Exception('too big');
                    }
                } else {
                    throw new Exception('no good extension');
                }
            } else {
                throw new Exception('file is empty');
            }
        }
        // $refExist = $itemsManager->getItemsSeller(['ref']);
        // var_dump($refExist);
        die();
    } else {
        throw new Error('Au moin champ est vide');
    }
}

/**
 * Update item
 */
function submitUpdate(): void
{
    $itemsManager = new ItemsManager();
    $updated = $itemsManager->updateItem($_POST['ref'], $_POST['nameItem'], $_POST['descriptionItem'], $_POST['price'], $_POST['size'], $_POST['stock'], $_GET['id']);

    Header('Location:index.php?action=dashboardSeller&submit-update=success');
}

/**
 * Update seller info
 */
function submitUpdateSeller($addressSeller, $cpSeller, $citySeller, $telSeller, $sellerId)
{
    $sellerManager = new SellerManager();
    $sellerUp = $sellerManager->updateSeller($addressSeller, $cpSeller, $citySeller, $telSeller, $sellerId);
    // var_dump($sellerUp);
    // die();

    Header('Location:index.php?action=dashboardSeller&submit-update-seller=success');
}