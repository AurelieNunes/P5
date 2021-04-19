<?php

use P5\model\CustomerManager;
use P5\model\SellerManager;
use P5\model\ItemsManager;
use P5\utils\Utils;

require_once './model/Manager.php';
require_once './utils/Utils.php';


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
        // redirige vers page d'accueil avec le nouveau paramètre

        Header('Location: index.php?action=loginSeller');
    }
}

/**
 * Delete Account Customer
 * @param int $customerId
 */
function deleteAccountCustomer(int $customerId)
{
    $customerManager = new CustomerManager();
    $deletedCustomer = $customerManager->deleteCustomer($customerId);
    $_SESSION = array();
    session_destroy();

    Header('Location: index.php?action=home&delete-account=success');
}

/**
 * Delete Account Seller
 * @param int $sellerId
 */
function deleteAccountSeller(int $sellerId)
{
    $sellerManager = new SellerManager();
    $deletedSeller = $sellerManager->deleteSeller($sellerId);
    $_SESSION = array();
    session_destroy();

    Header ('Location: index.php?action=dashboardSeller&delete-account=success');
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
 * Description Item
 * @param int $itemId
 * @return array
 */
function descriptionItem(int $itemId)
{
    $itemsManager = new ItemsManager();
    // $sellerManager = new SellerManager();
    $itemsDetails = $itemsManager->getItem($itemId);
    // $seller = $sellerManager -> getSellerCompanyById($sellerId);
    // var_dump($seller);
    // die();
    
    require('view/frontend/customer/descriptionProductView.php');
}

/**
 * Display Account Customer
 */
function displayAccountCustomer()
{
    require 'view/frontend/customer/updateCustomerView.php';
}

/**
 * Display Category
 */
function displayCategory()
{
    $itemsManager = new ItemsManager();
    $categories = $itemsManager->getAllCategories();
    require 'view/frontend/customer/listCategoryView.php';
}

/**
 * Display create item
 */
function displayCreateItem()
{
    $itemsManager = new ItemsManager();
    $categories = $itemsManager->getAllCategories();

    require 'view/frontend/seller/createItemSellerView.php';
}

/**
 * Display dashboard seller
 */
function displayDashboardSeller()
{
    require 'view/frontend/seller/dashboardSellerView.php';
}

/**
 * Get items in random
 */
function displayHome()
{
    $itemsManager = new ItemsManager();
    $sellerManager = new SellerManager();
    $itemsRandom = $itemsManager->randomItems();
    $sellerRandom = $sellerManager->randomSellers();
    // var_dump($sellerRandom);
    // die();

    $sellers = [];

    foreach ($itemsRandom as $item) {
        $sellerId = $item['id_seller'];
        $seller = $sellerManager->getSellerCompanyById($sellerId);
    
        $sellers[$sellerId] = $seller;
    }

    require('view/frontend/common/homeView.php');
}

/**
 * display items by category
 * @param int $category_id
 */
function displayItemsByCategory(int $category_id)
{
    $itemsManager = new ItemsManager();
    
    $itemsCategories = $itemsManager->getItemsByCategory($category_id);
    $categories = $itemsManager->getCategoryById($category_id);

    require('view/frontend/customer/itemsByCategoryView.php');
}

/**
 * Display login view
 */
function displayLogin()
{
    require('view/frontend/common/loginView.php');
}

/**
 * Display subscribe view
 */
function displaySubscribe()
{
    require('view/frontend/common/subscribeView.php');
}

/**
 * Display update Item
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
 * Display update seller account
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
 * Get All sellers
 */
function getAllSellers()
{
    // var_dump('test controller');
    // die();ok
    $sellerManager = new SellerManager();
    $allSellers = $sellerManager->allSellers();
    // var_dump($allSellers);
    // die(); //retourne plusieurs array
    require('view/frontend/customer/listSellersView.php');
}

/**
 * Get customer by Id
 * 
 */
function getCustomerById()
{
    // var_dump('test controller');
    // die();
    $customerManager= new CustomerManager();
    $customerCo = $customerManager->getCustomer($_SESSION['id']);
    // var_dump($customerCo);
    // die();
    
    require('view/frontend/customer/accountClientView.php');
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
 * Submit login customer
 * @param string $mail
 * @param string $pass
 * @return void
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
 * @param string $mail
 * @param string $pass
 * @return void
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
            if($_SESSION['isAdmin'] = $seller['isAdmin']){
                Header('Location: index.php?action=admin');
            }
            else {
                Header('Location: index.php?action=dashboardSeller');
            }
        } else {
            Header('Location: index.php?action=login&account-status=unsuccess-login');
        }
    }
}

/**
 * Logout
 * @return void
 */
function logout(): void
{
    $_SESSION = array();
    session_destroy();

    Header('Location: index.php?logout=success');
}

/**
 * New item
 * @param int $id_seller
 * @param int $price
 * @param int $stock
 * @param string $ref
 * @param string $nameItem
 * @param string $descriptionItem
 * @param string $size
 * @return void
 */
function newItem(int $id_seller,int $category, string $ref, string $nameItem, string $descriptionItem, int $price, string $size, int $stock): void
{
    $utils = new Utils();
    if (!$utils->isEmpty([$ref, $nameItem, $descriptionItem, $price, $stock])) {
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

                        $itemsManager->createItem($id_seller, $category, $ref, $nameItem, $descriptionItem, $price, $size, $stock, $path);

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
 * @return void
 */
function submitUpdate(): void
{
    $itemsManager = new ItemsManager();
    $updated = $itemsManager->updateItem($_POST['category_id'],$_POST['ref'], $_POST['nameItem'], $_POST['descriptionItem'], $_POST['price'], $_POST['size'], $_POST['stock'], $_POST['url_img'], $_GET['id']);

    Header('Location:index.php?action=dashboardSeller&submit-update=success');
}

/**
 * Update customer info
 * @param string $addressCustomer
 * @param string $cityCustomer
 * @param int $cpCustomer
 * @param int $telCustomer
 * @param int $customerId
 */
function submitUpdateCustomer(string $addressCustomer, int $cpCustomer, string $cityCustomer, int $telCustomer, int $customerId)
{
    $customerManager = new CustomerManager();
    $customerUp = $customerManager->updateCustomer($addressCustomer, $cpCustomer, $cityCustomer, $telCustomer, $customerId);

    Header('Location:index.php?action=accountClientView&submit-update-customer=success');
}

/**
 * Update seller info
 * @param string $addressSeller
 * @param string $citySeller
 * @param int $cpSeller
 * @param int $telSeller
 * @param int $sellerId
 */
function submitUpdateSeller(string $addressSeller, int $cpSeller, string $citySeller, int $telSeller, int $sellerId)
{
    $sellerManager = new SellerManager();
    $sellerUp = $sellerManager->updateSeller($addressSeller, $cpSeller, $citySeller, $telSeller, $sellerId);
    // var_dump($sellerUp);
    // die();

    Header('Location:index.php?action=dashboardSeller&submit-update-seller=success');
}