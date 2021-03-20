<?php

use P5\model\CustomerManager;
use P5\model\SellerManager;
use P5\model\ItemsManager;
use P5\utils\Utils;

require_once './model/Manager.php';
require_once './utils/Utils.php';

function displaySubscribe()
{
    require('view/frontend/common/subscribeView.php');
}

function displayLogin()
{
    require('view/frontend/common/loginView.php');
}

function addCustomer($lastName, $firstName, $mail, $pass)
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

// function displaySubscribeSeller(){
//     require('view/backend/subscribeView.php');
// }

// function displayLoginSeller(){
//     require('view/backend/loginView.php');
// }

function addSeller($company, $siret, $mail, $pass)
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

        Header('Location: index.php?action=sellerPanel');
    }
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

function loginSubmitCustomer($mail, $pass)
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

function displayDashboardSeller()
{
    require 'view/frontend/seller/dashboardSellerView.php';
}

function displayAccountSeller()
{
    require 'view/frontend/seller/accountSellerView.php';
}

function loginSubmitSeller($mail, $pass): void
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

function logout()
{
    $_SESSION = array();
    session_destroy();

    Header('Location: index.php?logout=success');
}

function displayCreateItem()
{
    require 'view/frontend/seller/createItemSellerView.php';
}

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

// Récup articles d'un vendeur
function getItemsSellerId()
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

//Recup article selon son id
function getItemId()
{
    $itemsManager = new ItemsManager();
    $item = $itemsManager->getItem($_GET['id']);
    // var_dump($item);
    // die();
    require('view/frontend/seller/itemView.php');
}

//Modifier un article
function displayUpdate()
{
    // var_dump('testDisplay');
    // die(); ok
    $itemsManager = new ItemsManager();
    $item = $itemsManager->getItem($_GET['id']);
    // var_dump($item);
    // die();
    require('view/frontend/seller/updateItemView.php');
}

// //soumettre modif article
function submitUpdate()
{
    // var_dump('test2');
    // die(); //ok
    $itemsManager = new ItemsManager();
    $updated = $itemsManager->updateItem($_POST['ref'], $_POST['nameItem'], $_POST['descriptionItem'], $_POST['price'], $_POST['size'], $_POST['stock'], $_GET['id']);
    // var_dump($_POST['stock']);
    // die(); //ok
    // var_dump($updated);
    // die(); //false
    Header('Location:index.php?action=dashboardSeller&submit-update=success');
}

// supprimer article vendeur
function deleteItem($itemId)
{
    $itemsManager = new ItemsManager();
    $deletedItem = $itemsManager->removeItem($itemId);

    Header('Location: index.php?action=dashboardSeller&delete-item=success');
}
