<?php
use P5\model\CustomerManager;
use P5\model\SellerManager;
use P5\model\ItemsManager;
use P5\utils\Utils;

require_once './model/Manager.php';
require_once './utils/Utils.php';

function displayAdmin()
{
	var_dump('test backend');
	die();
    require 'view/backend/adminView.php';
}

function loginAdmin() 
{
    var_dump('test controller');
    die();
	if (isset($_POST['pass']) AND $_POST['pass'] == "TEST") {
		header('Location: index.php?action=admin');
	} else {
		header('Location: index.php?action=admin-login-view&account-status=unsuccess-login');
	}
}
