<?php
session_start();

require './controller/frontend.php';
require './model/CustomerManager.php';

try {
    if(isset($_GET['action'])){
        switch ($_GET['action'])
        {
            case 'subscribeCustomer':
				displaySubscribeCustomer();
				break;
            
            case 'addCustomer':
            if (!empty($_POST['pseudoCustomer']) && !empty($_POST['passCustomer']) && !empty($_POST['pass_confirmCustomer']) && !empty($_POST['mailCustomer'])) {
                if (filter_var($_POST['mailCustomer'], FILTER_VALIDATE_EMAIL)) {
                    if ($_POST['passCustomer'] == $_POST['pass_confirmCustomer']) {
                        addCustomer(strip_tags($_POST['pseudoCustomer']), strip_tags($_POST['passCustomer']), strip_tags($_POST['mailCustomer']));
                    } else {
                        throw new Exception('Les deux mots de passe ne correspondent pas.');
                    }
                } else {
                    throw new Exception('Pas d\'adresse mail valide.');
                }
            } else {
                throw new Exception('Tous les champs ne sont pas remplis !');
            }
            break;

            case 'displayLoginCustomer' :
                displayLoginCustomer();
                break;

            case 'loginCustomer' :
                loginCustomer(strip_tags($_POST['pseudoCustomer']), strip_tags($_POST['passCustomer']));
				break;

            default :
                require('view/frontend/homeView.php');
            }           
} else {
    require('view/frontend/homeView.php'); }
} catch (Exception $e) {
    $errorMessage = $e->getMessage();
    require('view/frontend/errorView.php');
}
