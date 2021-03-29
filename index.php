<?php

use P5\utils\Utils;

session_start();

require './controller/frontend.php';
require './controller/backend.php';
require './model/CustomerManager.php';
require './model/SellerManager.php';
require './model/ItemsManager.php';
require_once './utils/Utils.php';

try {
    if (isset($_GET['action'])) {
        switch ($_GET['action']) {

            case 'addCustomer':
                /* Inscription Client*/
                $utils = new Utils();
                if(!$utils->isEmpty([
                    $_POST['lastName'] &&
                    $_POST['firstName'] &&
                    $_POST['mailCustomer'] &&
                    $_POST['passCustomer'] &&
                    $_POST['pass_confirmCustomer']
                ])){
                // if (!empty($_POST['lastName']) && !empty($_POST['firstName']) && !empty($_POST['mailCustomer']) && !empty($_POST['passCustomer']) && !empty($_POST['pass_confirmCustomer'])) {
                    if (filter_var($_POST['mailCustomer'], FILTER_VALIDATE_EMAIL)) {
                        if ($_POST['passCustomer'] == $_POST['pass_confirmCustomer']) {
                            addCustomer(strip_tags($_POST['lastName']), 
                            strip_tags($_POST['firstName']), 
                            strip_tags($_POST['mailCustomer']), 
                            strip_tags($_POST['passCustomer']));
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

            case 'addSeller':
                /* Ajout vendeur */
                $utils = new Utils();
                if(!$utils->isEmpty([
                    $_POST['companySeller'] &&
                    $_POST['siret'] &&
                    $_POST['mailSeller'] &&
                    $_POST['passSeller'] &&
                    $_POST['pass_confirmSeller']
                ])){
                    // if (!empty($_POST['companySeller']) && !empty($_POST['siret']) && !empty($_POST['mailSeller']) && !empty($_POST['passSeller']) && !empty($_POST['pass_confirmSeller'])) {
                    if (filter_var($_POST['mailSeller'], FILTER_VALIDATE_EMAIL)) {
                        if ($_POST['passSeller'] == $_POST['pass_confirmSeller']) {
                            addSeller(strip_tags($_POST['companySeller']), 
                            strip_tags($_POST['siret']), 
                            strip_tags($_POST['mailSeller']), 
                            strip_tags($_POST['passSeller']),
                            strip_tags($_POST['pass_confirmSeller'])
                        );
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
            
            case 'createItem':
                if (isset($_SESSION)) {
                    displayCreateItem();
                }
                break;

            case 'dashboardSeller':
                displayDashboardSeller();
                break;

            case 'deleteItem':
                deleteItem(intval($_GET['id']));
                break;

            case 'displayUpdateItem':
                displayUpdate();
                break;

            case 'displayUpdateSeller' :
                // var_dump('test update');
                // die(); ok
                displayUpdateSeller();
                break;

            case 'item':
                getItemId();
                break;

            case 'listItemsSeller':
                getItemsSellerId();
                break;

            case 'loginCustomer':
                /* Affichage connexion Client*/
                displayLogin();
                break;

            case 'loginSeller':
                /* Affichage connexion Vendeur*/
                displayLogin();
                break;

            case 'loginSubmitCustomer':
                /* Connexion client */
                loginSubmitCustomer(strip_tags($_POST['mailSubmitCustomer']), strip_tags($_POST['passSubmitCustomer']));
                break;

            case 'loginSubmitSeller':
                /* connexion vendeur */
                loginSubmitSeller(strip_tags($_POST['mailSubmitSeller']), strip_tags($_POST['passSubmitSeller']));
                break;

            case 'logout':
                logout();
                break;
        
            case 'newItem':
                $utils = new Utils();
                if ($utils->isIsset([
                    $_SESSION['id'],
                    $_POST['ref'],
                    $_POST['nameItem'],
                    $_POST['descriptionItem'],
                    $_POST['price'],
                    $_POST['size']
                    ])) {
                        newItem(
                            $_SESSION['id'],
                            $_POST['ref'],
                            $_POST['nameItem'],
                            $_POST['descriptionItem'],
                            $_POST['price'],
                            $_POST['size'],
                            $_POST['stock']
                        );
                } else {
                    throw new Exception('Contenu vide !');
                    }
                break;

            case 'submitUpdate':
                submitUpdate($_GET['id']);
                break;

            case 'submitUpdateSeller':
                // var_dump('test index');
                // die();
                submitUpdateSeller($_POST['addressSeller'], $_POST['cpSeller'], $_POST['citySeller'], $_POST['telSeller'], $_SESSION['id']);
                // var_dump(submitUpdateSeller($_POST['addressSeller'], $_POST['cpSeller'], $_POST['citySeller'], $_POST['telSeller'], $_SESSION['id']));
                // die();
                break;
    
            case 'subscribeSeller':
                /* Affichage inscription vendeur */
                displaySubscribe();
                break;

            case 'subscribeCustomer':
                /* Affichage inscription Client*/
                displaySubscribe();
                break;

                // case 'allItems':
                //     getAllItems();
                //     // var_dump('ok');
                //     // die();
                //     break;

            default:
                require('view/frontend/common/homeView.php');
        }
    } else {
        require('view/frontend/common/homeView.php');
    }
} catch (Exception $e) {
    $errorMessage = $e->getMessage();
    // var_dump($errorMessage);
    require('view/frontend/common/errorView.php');
}
