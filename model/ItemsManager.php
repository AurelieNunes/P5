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
        $req = $db-> prepare('SELECT id, id_seller, ref, nameItem, descriptionItem, price, size, stock FROM items WHERE id_seller = ?');
        $req->execute(array($sellerId));
        $itemsSeller = $req->fetchAll();
        // var_dump($itemsSeller);
        // die();
       
        return $itemsSeller;
    }

    //Récup un article selon son id
    public function getItem($itemId)
    {
        // var_dump('testModel');
        // die();
        $db = $this->dbConnect();
        $req = $db->prepare('SELECT id, id_seller, ref, nameItem, descriptionItem, price, size, stock FROM items WHERE id = ?');
        $req->execute(array($itemId));
        $item = $req->fetch();
        // var_dump($item);
        // die();
        return $item;
    }

    // //Mettre à jour article
    public function updateItem($ref, $nameItem, $descriptionItem, $price, $size, $stock, $itemId)
    {
        // var_dump('testmodel');
        // die(); //ok
        $db = $this->dbConnect();
        $req = $db->prepare('UPDATE items SET ref=?, nameItem=?,descriptionItem=?, price=?, size=?, stock=? WHERE id=?');
        $req->execute(array($ref, $nameItem, $descriptionItem, $price, $size, $stock, $itemId));
        // var_dump($itemId);
        // die(); //ok
        $itemUpdate = $req->fetch();
        // var_dump($itemUpdate);
        // die(); //boolean false
        return $itemUpdate;
    }

    // //Récup tous les articles
    // public function getItems()
    // {
    //     // var_dump('ok');
    //     // die();
    //     $db = $this->dbConnect();
    //     $req = $db->prepare('SELECT * FROM items ORDER BY id');
    //     // var_dump($req);
    //     // die();
    //     return $req;
    // }
}