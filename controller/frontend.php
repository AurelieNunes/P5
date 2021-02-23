<?php

use P5\model\CustomerManager;
use P5\model\SellerManager;

require_once './model/Manager.php';

function displaySubscribe(){
    require('view/frontend/subscribeView.php');
}

function displayLogin(){
    require('view/frontend/loginView.php');
}

function addCustomer ($lastName,$firstName,$mail,$pass){

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
    require 'view/backend/dashboardSellerView.php';
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
