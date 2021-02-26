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

    //Récup tous les articles
    // public function getItems(){
    //     // var_dump('ok');
    //     // die();
    //     $db = $this->dbConnect();
    //     $req = $db->query('SELECT id, id_seller, ref, nameItem, descriptionItem, price, size, stock FROM items');
    //     // var_dump($req);
    //     // die();
    //     return $req;
    // }

    //Récup un article selon l'id du vendeur
    public function getItemsSeller($itemId)
    {
        // var_dump($itemId);
        // die();
        $db=$this->dbConnect();
        $itemsSeller = $db->prepare('SELECT id, id_seller, ref, nameItem, descriptionItem, price, size, stock FROM items WHERE id_seller=?');
        $itemsSeller->execute(array($itemId));
        // var_dump($itemsSeller);
        // die();
        return $itemsSeller;
    }

    //Récupérer tous les articles du vendeur 
    //
}