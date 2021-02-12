<?php

use P5\model\CustomerManager;
use P5\model\SellerManager;

require_once './model/Manager.php';

function displaySubscribeCustomer(){
    require('view/frontend/subscribeView.php');
}

function addCustomer ($pseudo,$pass,$mail){

    $customerManager = new CustomerManager();

    $usernameValidity = $customerManager->checkPseudo($pseudo);
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
        $newCustomer = $customerManager->subscribeCustomer($pseudo, $pass, $mail);
        $newCustomer;
        
        // redirige vers page d'accueil avec le nouveau paramètre
        header('Location: index.php?account-status=account-successfully-created');
}
}

function displayLoginCustomer(){
    require('view/frontend/loginView.php');
}

function loginCustomer($pseudo){
    $customerManager = new CustomerManager();
    $customer = $customerManager->loginCustomer($pseudo);

    $isPasswordCorrect = password_verify($_POST['pass'], $customer['pass']);

	if (!$customer) {
        header('Location: index.php?action=login&account-status=unsuccess-login');
    }
    else {
    	if ($isPasswordCorrect) {
    		$_SESSION['id'] = $customer['id'];
			$_SESSION['pseudo'] = ucfirst(strtolower($pseudo));
    		header('Location: index.php');
    	}
        else {
        	header('Location: index.php?action=login&account-status=unsuccess-login');
        }
    }
}

function displaySubscribeSeller(){
    require ('view/frontend/subscribeView.php');
}

function addSeller($name,$siret,$pass,$mail)
{
    $sellerManager = new SellerManager();
    $nameSellerCheck = $sellerManager->checkName($name);
    $mailSellerCheck = $sellerManager->checkMail($mail);
    $siretSellerCheck = $sellerManager->checkSiret($siret);

    if ($nameSellerCheck) {
        header('Location: index.php?action=subscribe&error=invalidUsername');	
    }

    if ($mailSellerCheck) {
        header('Location: index.php?action=subscribe&error=invalidMail');
    }

    if ($siretSellerCheck) {
        header('Location:index.php?action=subscribe&error=invalidSiret');
    }

    if (!$nameSellerCheck && !$mailSellerCheck && !$siretSellerCheck) {
        // Hachage du mot de passe
        $pass = password_hash($_POST['passSeller'], PASSWORD_DEFAULT);
        $newSeller = $sellerManager->subscribeSeller($name, $siret, $pass, $mail);
        $newSeller;
        
        // redirige vers page d'accueil avec le nouveau paramètre
 
       header('Location: index.php?account-status=account-successfully-created');
}
}
