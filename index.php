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

            case 'addCustomer':
                /* subscribe customer */
                $utils = new Utils();
                if (!$utils->isEmpty([
                    $_POST['lastName'] &&
                        $_POST['firstName'] &&
                        $_POST['mailCustomer'] &&
                        $_POST['passCustomer'] &&
                        $_POST['pass_confirmCustomer']
                ])) {
                    if (filter_var($_POST['mailCustomer'], FILTER_VALIDATE_EMAIL)) {
                        if ($_POST['passCustomer'] == $_POST['pass_confirmCustomer']) {
                            addCustomer(
                                strip_tags($_POST['lastName']),
                                strip_tags($_POST['firstName']),
                                strip_tags($_POST['mailCustomer']),
                                strip_tags($_POST['passCustomer']),
                                strip_tags($_POST['pass_confirmCustomer'])
                            );
                        } else {
                            Header('Location : index.php?action=subscribeCustomer&error=passwordInvalid');
                        }
                    } else {
                        Header('Location : index.php?action=subscribeCustomer&error=invalidMail');
                    }
                } else {
                    echo 'Un des champs est vide !';
                }
                break;

            case 'addSeller':
                /* subscribe seller */
                $utils = new Utils();
                if (!$utils->isEmpty([
                    $_POST['companySeller'] &&
                        $_POST['siret'] &&
                        $_POST['mailSeller'] &&
                        $_POST['passSeller'] &&
                        $_POST['pass_confirmSeller']
                ])) {
                    if (filter_var($_POST['mailSeller'], FILTER_VALIDATE_EMAIL)) {
                        if ($_POST['passSeller'] == $_POST['pass_confirmSeller']) {
                            addSeller(
                                strip_tags($_POST['companySeller']),
                                strip_tags($_POST['siret']),
                                strip_tags($_POST['mailSeller']),
                                strip_tags($_POST['passSeller']),
                                strip_tags($_POST['pass_confirmSeller'])
                            );
                        } else {
                            Header('Location : index.php?action=subscribeSeller&error=passwordInvalid');
                        }
                    } else {
                        Header('Location : index.php?action=subscribeSeller&error=invalidMail');
                    }
                } else {
                    echo 'un des champs est vide !';
                }
                break;

            case 'admin':
                /* dashboard admin */
                if (isset($_SESSION) && isset($_SESSION['isAdmin']) && ($_SESSION['isAdmin'] === '1')) {
                    displayAdmin();
                } else {
                    throw new Exception('Administrateur non identifié');
                }
                break;

            case 'cardSeller':
                displayCardSeller($_GET['id_seller']);
                break;

            case 'category':
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

            case 'deleteAccountCustomer':
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

            case 'displayItemsByCategory':
                displayItemsByCategory($_GET['category_id']);
                break;

            case 'displayUpdateCustomer':
                displayUpdateCustomer();
                break;

            case 'displayUpdateItem':
                displayUpdate();
                break;

            case 'displayUpdateSeller':
                displayUpdateSeller();
                break;

            case 'getCustomer':
                if (isset($_SESSION) && isset($_SESSION['id'])) {
                    getCustomerById($_SESSION['id']);
                } else {
                    displayHome();
                }
                break;

            case 'home':
                displayHome();
                break;

            case 'item':
                getItemId();
                break;

            case 'listItemsSeller':
                /* Items of Seller */
                getItemsSellerId();
                break;

            case 'listSellers':
                getAllSellers();
                break;

            case 'loginCustomer':
                displayLogin();
                break;

            case 'loginSeller':
                displayLogin();
                break;

            case 'loginSubmitCustomer':
                loginSubmitCustomer(strip_tags($_POST['mailSubmitCustomer']), strip_tags($_POST['passSubmitCustomer']));
                break;

            case 'loginSubmitSeller':
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
                submitUpdateCustomer($_POST['addressCustomer'], $_POST['cpCustomer'], $_POST['cityCustomer'], $_POST['telCustomer'], $_SESSION['id']);
                break;

            case 'submitUpdateSeller':
                submitUpdateSeller($_POST['addressSeller'], $_POST['cpSeller'], $_POST['citySeller'], $_POST['telSeller'], $_POST['descriptionShop'], $_SESSION['id']);
                break;

            case 'subscribeCustomer':
                displaySubscribe();
                break;

            case 'subscribeSeller':
                displaySubscribe();
                break;

            default:
                Header('Location : index.php?action=Home');
        }
    } else {
        displayHome();
    }
} catch (Exception $e) {
    $errorMessage = $e->getMessage();
    require('view/frontend/common/errorView.php');
}
