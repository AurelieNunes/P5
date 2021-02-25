<?php
namespace P5\model;

use \P5\model\Manager;

class ItemsManager extends Manager 
{
    public function createItem ($id_seller, $ref, $nameItem, $descriptionItem, $price, $size, $stock) 
    {
        // var_dump($id_seller, $ref, $nameItem, $descriptionItem, $price, $size, $stock);
        // die();
        $db = $this->dbConnect();
        $addItem = $db->prepare('INSERT INTO items (id_seller, ref, nameItem, descriptionItem, price, size, stock) VALUES (?,?,?,?,?,?,?)');
        
        $addItem->execute(array($id_seller, $ref, $nameItem, $descriptionItem, $price, $size, $stock));
        

        return $addItem;
    }

    public function getItem($id_seller)
    {
        $db=$this->dbConnect();
        $item = $db->prepare('SELECT id, id_seller, ref, nameItem, descriptionItem, price, size, stock FROM items WHERE id_seller=?');
        $item->execute(array($id_seller));

        return $item;
    }
}