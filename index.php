<?php
session_start();

require './controller/frontend.php';
require './controller/backend.php';
require './model/CustomerManager.php';
require './model/SellerManager.php';
require './model/ItemsManager.php';


try {
    if(isset($_GET['action'])){
        switch ($_GET['action'])
        {
            case 'subscribeCustomer':
                /* Affichage inscription Client*/
				displaySubscribe();
				break;
            
            case 'addCustomer':
                /* Inscription Client*/
            if (!empty($_POST['lastName']) && !empty($_POST['firstName']) && !empty($_POST['mailCustomer']) && !empty($_POST['passCustomer']) && !empty($_POST['pass_confirmCustomer'])) {
                if (filter_var($_POST['mailCustomer'], FILTER_VALIDATE_EMAIL)) {
                    if ($_POST['passCustomer'] == $_POST['pass_confirmCustomer']) {
                        addCustomer(strip_tags($_POST['lastName']),strip_tags($_POST['firstName']), strip_tags($_POST['mailCustomer']), strip_tags($_POST['passCustomer']));
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

            case 'loginCustomer' :
                /* Affichage connexion Client*/
                displayLogin();
                break;

            case 'loginSeller' :
                /* Affichage connexion Vendeur*/
                displayLogin();
                break;

            case 'loginSubmitCustomer' :
                /* Connexion client */
                loginSubmitCustomer(strip_tags($_POST['mailSubmitCustomer']), strip_tags($_POST['passSubmitCustomer']));
				break;

            case 'subscribeSeller' :
                /* Affichage inscription vendeur */
                displaySubscribe();
                break;
            
            case 'addSeller':
                /* Ajout vendeur */
                if (!empty($_POST['companySeller']) && !empty($_POST['siret']) && !empty($_POST['mailSeller']) && !empty($_POST['passSeller']) && !empty($_POST['pass_confirmSeller'])) {
                    if (filter_var($_POST['mailSeller'], FILTER_VALIDATE_EMAIL)) {
                        if ($_POST['passSeller'] == $_POST['pass_confirmSeller']) {
                            addSeller(strip_tags($_POST['companySeller']), strip_tags($_POST['siret']), strip_tags($_POST['mailSeller']), strip_tags($_POST['passSeller']));
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

            case 'loginSubmitSeller' :
                /* connexion vendeur */
                loginSubmitSeller(strip_tags($_POST['mailSubmitSeller']), strip_tags($_POST['passSubmitSeller']));
                break;
            
            case 'dashboardSeller' :
                displayDashboardSeller();
                break;

            case 'createItem' :
                if (isset($_SESSION)){
                    displayCreateItem();
                    break;
                }
            
            case 'newItem':

                if (isset($_GET['mailSubmitSeller']) && $_GET['mailSubmitSeller'] > 0){
                if (!empty($_SESSION['mailSubmitSeller']) && !empty($_POST['ref']) && !empty($_POST['nameItem']) && !empty($_POST['descriptionItem']) && !empty($_POST['price']) && !empty($_POST['size']) && !empty($_POST['stock'])) {
                        newItem($_GET['id'], $_SESSION['mailSubmitSeller'], $_POST['ref'], $_POST['nameItem'],$_POST['descriptionItem'], $_POST['price'], $_POST['size'], $_POST['stock']);
                } else {
                        throw new Exception('Contenu vide !');
                    } 
                } else {
                        throw new Exception ('pas d articles');
                    }
                    break;
                    // var_dump($_POST['ref']);
                    // var_dump($_POST['nameItem']);
                    // var_dump($_POST['descriptionItem']);
                    // var_dump($_POST['price']);
                    // var_dump($_POST['size']);
                    // var_dump($_POST['stock']);
                    // die();
                case 'logout':
                /* déconnexion */
                logout();
                break;

            default :
                require('view/frontend/customer/homeView.php');
            }           
} else {
    require('view/frontend/customer/homeView.php'); }
} catch (Exception $e) {
    $errorMessage = $e->getMessage();
    // var_dump($errorMessage);
    require('view/frontend/common/errorView.php');
}
