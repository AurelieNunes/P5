<?php

namespace P5\model;

use \P5\model\Manager;

class ItemsManager extends Manager
{
    /**
     * Add item in DATABASE
     * @param string
     * @param int
     */
    public function createItem(int $id_seller,int $category,string $ref, string $nameItem, string $descriptionItem, int $price, string $size, int $stock, string $path): void
    {
        $db = $this->dbConnect();
        $addItem = $db->prepare('INSERT INTO items (id_seller, category_id, ref, nameItem, descriptionItem, price, size, stock, url_img) VALUES (?,?,?,?,?,?,?,?,?)');
        $addItem->execute(array($id_seller,$category, $ref, $nameItem, $descriptionItem, $price, $size, $stock, $path));
        // var_dump($addItem);
        // die();//OK
    }

    /**
     * Get all Categories
     */
    public function getAllCategories()
    {
        // var_dump('test model');
        // die(); OK
        $db = $this->dbConnect();
        $req = $db->query('SELECT * FROM categories');
        $categories = $req->fetchAll();
        // var_dump($categories);
        // die();//return arrays
        return $categories;
    }

    /**
     * Get all Items in DATABASE
     */
    public function getAllItems()
    {
        // var_dump('ok');
        // die();
        $db = $this->dbConnect();
        $req = $db->prepare('SELECT * FROM items ORDER BY id');
        $items = $req->fetchAll();
        // var_dump($items);
        // die();
        return $items;

    }

    /**
     * Get all ref in DATABASE
     * @return array tableau de string qui correspond à ttes les ref de la bdd
     */
    public function getAllRef(): array
    {
        $db = $this->dbConnect();
        $req = $db->query('SELECT ref FROM items');
        $refs = $req -> fetchAll();

        return $refs;
    }

    /**
     * Get item by id
     * @return array tableau avec toutes les informations d'un article selon son id
     * @param int $itemId
     */
    public function getItem(int $itemId): array
    {
        $db = $this->dbConnect();
        $req = $db->prepare('SELECT id, id_seller, ref, nameItem, descriptionItem, price, size, stock FROM items WHERE id = ?');
        $req->execute(array($itemId));
        $item = $req->fetch();
        return $item;
    }

    /**
     * Get all item of one seller
     * @return array retourne un tableau contenant tous les articles d'un vendeur
     * @param int $sellerId
     */
    public function getItemsSeller(int $sellerId): array
    {
        $db = $this->dbConnect();
        $req = $db->prepare('SELECT id, id_seller, ref, nameItem, descriptionItem, price, size, stock FROM items WHERE id_seller = ?');
        $req->execute(array($sellerId));
        $itemsSeller = $req->fetchAll();

        return $itemsSeller;
    }

    /**
     * Delete item by id
     * @param int $itemId
     * @return ...
     */
    // Sup article
    public function removeItem(int $itemId)
    {
        $db = $this->dbConnect();
        $req = $db->prepare('DELETE FROM items WHERE id=?');
        $req->execute(array($itemId));
        $deleted = $req->fetch();

        return $deleted;
    }

    /**
     * Update item
     * @return bool
     * @param int $price $stock $itemId
     * @param string $ref, $nameItem, $descriptionItem, $size
     */
    // //Mettre à jour article
    public function updateItem(string $ref, string $nameItem, string $descriptionItem, int $price,string $size, int $stock, int $itemId): bool
    {
        $db = $this->dbConnect();
        $req = $db->prepare('UPDATE items SET ref=?, nameItem=?,descriptionItem=?, price=?, size=?, stock=? WHERE id=?');
        $req->execute(array($ref, $nameItem, $descriptionItem, $price, $size, $stock, $itemId));
        $itemUpdate = $req->fetch();
        // var_dump($itemUpdate);
        // die(); //boolean false
        return $itemUpdate;
    }
}
