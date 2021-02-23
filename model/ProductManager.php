<?php
namespace P5\model;

use \P5\model\Manager;

class ItemsManager extends Manager {
    
    public function createItem($id_seller,$ref, $nameItem, $descriptionItem, $price, $size, $stock) 
    {
        // var_dump('test2');
        // die;
        $db = $this->dbConnect();
        $addItem = $db->prepare('INSERT INTO items (id_seller,ref, nameItem, descriptionItem, price, size, stock) VALUES (?,?,?,?,?,?,?)');
        $addItem->execute(array($id_seller, $ref, $nameItem, $descriptionItem, $price, $size, $stock));
        
        return $addItem;
    }
}