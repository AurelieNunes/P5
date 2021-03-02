<?php
namespace P5\model;

use \P5\model\Manager;

class ItemsManager extends Manager 
{
    //Ajout d'un article
    public function createItem ($id_seller, $ref, $nameItem, $descriptionItem, $price, $size, $stock) 
    {
        // var_dump($id_seller, $ref, $nameItem, $descriptionItem, $price, $size, $stock);
        // die();
        $db = $this->dbConnect();
        $addItem = $db->prepare('INSERT INTO items (id_seller, ref, nameItem, descriptionItem, price, size, stock) VALUES (?,?,?,?,?,?,?)');
        
        $addItem->execute(array($id_seller, $ref, $nameItem, $descriptionItem, $price, $size, $stock));
        
        return $addItem;
    }
    
    //Récup articles selon vendeur
    public function getItemsSeller($sellerId)
    {
        $db = $this->dbConnect();
        $itemsSeller = $db-> prepare('SELECT id, id_seller,ref, nameItem, descriptionItem, price, size, stock FROM items WHERE id_seller = ?');
        $itemsSeller->execute(array($sellerId));
        // var_dump($itemsSeller);
        // die();
        //C:\wamp64\www\P5\model\ItemsManager.php:27:
// object(PDOStatement)[4]
// public 'queryString' => string 'SELECT id, id_seller,ref, nameItem, descriptionItem, price, size, stock FROM items WHERE id_seller = ?' (length=105)
        return $itemsSeller;
    }

    //Récup tous les articles
    public function getItems()
    {
        // var_dump('ok');
        // die();
        $db = $this->dbConnect();
        $req = $db->prepare('SELECT id, id_seller,ref, nameItem, descriptionItem, price, size, stock FROM items ORDER BY id');
        // var_dump($req);
        // die();
        return $req;
    }
}