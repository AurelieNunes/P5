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
            case 'about':
                displayAbout();
                break;

            case 'accountCustomer' :
                displayAccountCustomer();
                break;

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
            
            case 'admin':
                // var_dump('routeur');
                // die();
                if (isset($_SESSION) && $_SESSION['isAdmin'] == '1') {
                displayAdmin();
                    } else {
                        throw new Exception('Administrateur non identifié');
                    }
                break;

            case 'cardSeller' :
                displayCardSeller($_GET['id_seller']);
                break;
                
            case 'category' :
                displayCategory();
                break;

            case 'createItem':
                if (isset($_SESSION)) {
                    displayCreateItem();
                }
                break;

            case 'dashboardSeller':
                displayDashboardSeller();
                break;

            case 'deleteAccountCustomer' :
                deleteAccountCustomer($_SESSION['id']);
            
            case 'deleteAccountSeller':
                deleteAccountSeller($_SESSION['id']);
                break;
            
            case 'deleteCustomer':
                deleteCustomer($_GET['id']);
                break;

            case 'deleteItem':
                deleteItem(intval($_GET['id']));
                break;
            
            case 'deleteItemByAdmin':
                deleteItemByAdmin(intval($_GET['id']));
                break;

            case 'deleteSeller':
                deleteSeller($_GET['id']);
                break;
            
            case 'descriptionItem':
                /*See more item of home*/
                descriptionItem($_GET['itemId']);
                break;

            case 'displayAccountCustomer':
                displayAccountCustomer();
                break;
    
            case 'displayItemsByCategory':
                displayItemsByCategory($_GET['category_id']);
                break;
            
            case 'displayUpdateItem':
                displayUpdate();
                break;

            case 'displayUpdateSeller' :
                displayUpdateSeller();
                break;

            case 'getCustomer' :
                getCustomerById($_SESSION['id']);
                break;

            case 'home' :
                displayHome();
                break;

            case 'item':
                getItemId();
                break;

            case 'listItemsSeller':
                /* Items of Seller */
                getItemsSellerId();
                break;

            case 'listSellers' :
                // var_dump('index');
                // die();
                getAllSellers();
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
        
            case 'manageCustomers':
                manageAllCustomers();
                break;

            
            case 'manageItems':
                manageAllItems();
                break;

            case 'manageSellers':
                manageAllSellers();
                break;

            case 'newItem':
                $utils = new Utils();
                if ($utils->isIsset([
                    $_SESSION['id'],
                    $_POST['categories'],
                    $_POST['ref'],
                    $_POST['nameItem'],
                    $_POST['descriptionItem'],
                    $_POST['price'],
                    $_POST['size'],
                    ])) {
                        newItem(
                            $_SESSION['id'],
                            $_POST['categories'],
                            $_POST['ref'],
                            $_POST['nameItem'],
                            $_POST['descriptionItem'],
                            $_POST['price'],
                            $_POST['size'],
                            $_POST['stock'],
                        );
                } else {
                    throw new Exception('Contenu vide !');
                    }
                break;

            case 'submitUpdate':
                submitUpdate($_GET['id']);                
                break;

            case 'submitUpdateCustomer':
                submitUpdateCustomer($_POST['addressCustomer'],$_POST['cpCustomer'], $_POST['cityCustomer'], $_POST['telCustomer'], $_SESSION['id']);
                break;

            case 'submitUpdateSeller':
                // var_dump('router');
                // die();
                submitUpdateSeller($_POST['addressSeller'], $_POST['cpSeller'], $_POST['citySeller'], $_POST['telSeller'], $_POST['descriptionShop'], $_SESSION['id']);
                var_dump(submitUpdateSeller($_POST['addressSeller'], $_POST['cpSeller'], $_POST['citySeller'], $_POST['telSeller'], $_POST['descriptionShop'], $_SESSION['id']));
                die();
                break;
            
            case 'subscribeCustomer':
                /* Affichage inscription Client*/
                displaySubscribe();
                break;
    
            case 'subscribeSeller':
                /* Affichage inscription vendeur */
                displaySubscribe();
                break;

            default:
                require('view/frontend/common/homeView.php');
        }
    } else {
        displayHome();
    }
} catch (Exception $e) {
    $errorMessage = $e->getMessage();

    require('view/frontend/common/errorView.php');
}
