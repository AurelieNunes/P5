<?php
use P5\model\CustomerManager;
use P5\model\SellerManager;
use P5\model\ItemsManager;

require_once './model/Manager.php';

function displaySubscribe(){
    require('view/frontend/common/subscribeView.php');
}

function displayLogin(){
    require('view/frontend/common/loginView.php');
}

function addCustomer($lastName,$firstName,$mail,$pass){

    $customerManager = new CustomerManager();

    $usernameValidity = $customerManager->checkLastName($lastName);
	$mailValidity = $customerManager->checkMail($mail);

    if ($usernameValidity) {
        header('Location: index.php?action=subscribe&error=invalidUsername');	
    }

    if ($mailValidity) {
        header('Location: index.php?action=subscribe&error=invalidMail');
    }

    if (!$usernameValidity && !$mailValidity) {
        // Hachage du mot de passe
        $pass = password_hash($_POST['passCustomer'], PASSWORD_DEFAULT);
        $newCustomer = $customerManager->subscribeCustomer($lastName, $firstName, $mail, $pass);
        $newCustomer;
        
        // redirige vers page d'accueil avec le nouveau paramètre
        header('Location: index.php?account-status=account-successfully-created');
}
}

// function displaySubscribeSeller(){
//     require('view/backend/subscribeView.php');
// }

// function displayLoginSeller(){
//     require('view/backend/loginView.php');
// }

function addSeller($company,$siret,$mail, $pass)
{
    $sellerManager = new SellerManager();

    $companySellerCheck = $sellerManager->checkCompany($company);
    $siretSellerCheck = $sellerManager->checkSiret($siret);
    $mailSellerCheck = $sellerManager->checkMail($mail);


    if ($companySellerCheck) {
        header('Location: index.php?action=subscribe&error=invalidUsername');	
    }

    if ($siretSellerCheck) {
        header('Location:index.php?action=subscribe&error=invalidSiret');
    }

    if ($mailSellerCheck) {
        header('Location: index.php?action=subscribe&error=invalidMail');
    }

    if (!$companySellerCheck && !$siretSellerCheck && !$mailSellerCheck ) {
        // Hachage du mot de passe
        $pass = password_hash($_POST['passSeller'], PASSWORD_DEFAULT);
        $newSeller = $sellerManager->subscribeSeller($company, $siret, $mail, $pass);
        $newSeller;
        // var_dump($newSeller);
        // die;
        // redirige vers page d'accueil avec le nouveau paramètre
 
       header('Location: index.php?action=sellerPanel');
}
}


function loginSubmitCustomer($mail,$pass){
    
    $customerManager = new CustomerManager();
    $customer = $customerManager->loginCustomer($mail);
    
    $isPasswordCorrect = password_verify($_POST['passSubmitCustomer'], $customer['pass']);

	if (!$customer) {
        header('Location: index.php?action=login&account-status=unsuccess-login');
    }
    else {
    	if ($isPasswordCorrect) {
    		$_SESSION['id'] = $customer['id'];
			$_SESSION['mailSubmitCustomer'] = ucfirst(strtolower($mail));
    		header('Location: index.php');
    	}
        else {
        	header('Location: index.php?action=login&account-status=unsuccess-login');
        }
    }
}

function displayDashboardSeller(){
    require 'view/frontend/seller/dashboardSellerView.php';
}

function loginSubmitSeller($mail,$pass){
    $sellerManager = new SellerManager();
    $seller = $sellerManager->loginSeller($mail);

    $isPasswordCorrect = password_verify($_POST['passSubmitSeller'], $seller['pass']);

	if (!$seller) {
        header('Location: index.php?action=login&account-status=unsuccess-login');
    }
    else {
    	if ($isPasswordCorrect) {
    		$_SESSION['id'] = $seller['id'];
			$_SESSION['mailSubmitSeller'] = ucfirst(strtolower($mail));
    		header('Location: index.php?action=dashboardSeller');
    	}
        else {
        	header('Location: index.php?action=login&account-status=unsuccess-login');
        }
    }
}

function logout() {
	$_SESSION = array();
	session_destroy();

	header('Location: index.php?logout=success');
}

function displayCreateItem(){
    require 'view/frontend/seller/createItemSellerView.php';
}

function newItem($id_seller, $ref, $nameItem, $descriptionItem, $price, $size, $stock)
{
    // var_dump('test');
    // die();
    $itemsManager = new ItemsManager();

    $itemAdd = $itemsManager->createItem($id_seller,$ref, $nameItem, $descriptionItem, $price, $size, $stock);
    $itemAdd;
    // var_dump($itemAdd);
    // die();
    if ($itemAdd === false) {
        throw new Exception('Impossible d\'ajouter l\'article !');
    }
    else {
        Header ('Location: index.php?action=dashboardSeller&new-item=success');
    }

    // var_dump($itemAdd);
    // die();
}

// Récup articles d'un vendeur
function getItemsSellerId()
{
    $itemsManager = new ItemsManager();
    $sellerManager = new SellerManager();
    $items = $itemsManager-> getItemsSeller($_SESSION['id']);
    // var_dump($items);
    // die();
    if ($items) {
        $seller = $sellerManager->getSeller($_SESSION['id']);
        // var_dump($seller);
        // die();
    } else {
        header('Location : index.php?=dashboardSeller');
    }
    require ('view/frontend/seller/listItemsView.php');
}

    //Recup article selon son id
    function getItemId()
    {  
        $itemsManager = new ItemsManager();
        $item = $itemsManager->getItem($_GET['id']);
        // var_dump($item);
        // die();
        require ('view/frontend/seller/itemView.php');
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
        require ('view/frontend/seller/updateItemView.php');
    }

    // //soumettre modif article
    function submitUpdate()
    {
        // var_dump('test2');
        // die(); //ok
        $itemsManager = new ItemsManager();
        $updated = $itemsManager->updateItem($_POST['ref'], $_POST['nameItem'], $_POST['descriptionItem'], $_POST['price'], $_POST['size'], $_POST['stock'], $_GET['id']);
        // var_dump($updated);
        // die(); //false

        Header ('Location : index.php?action=dashboardSeller&updateItem=success');
    }

    // //Récupérer tous les articles
    // function getAllItems()
    // {
    //     $itemsManager = new ItemsManager();
    //     $items = $itemsManager->getItems();
    //     // var_dump($items);
    //     // die();
    //     require ('view/frontend/common/homeView.php');
    // }