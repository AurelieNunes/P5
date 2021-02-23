<?php

use P5\model\ItemsManager;


require_once './model/Manager.php';

function displayCreateItem(){
    require 'view/backend/createItemSellerView.php';
}

function newItem($id_seller,$ref, $nameItem, $descriptionItem, $price, $size, $stock){
    // var_dump('test');
    // die;
    $itemsManager = new ItemsManager();
    
    $newItem = $itemsManager->createItem ($id_seller,$ref, $nameItem, $descriptionItem, $price, $size, $stock);
    $newItem;
    // var_dump($newItem);
    // die;

    Header ('Location: index.php?action=dashboardSeller=seller&new-item=success');
}


