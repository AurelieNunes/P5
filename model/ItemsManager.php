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
     * @return array
     */
    public function getAllCategories(): array
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
     * Get categories by id
     * @param int $category_id
     * @return array
     */
    public function getCategoryById(int $category_id): array
    {
        $db=$this->dbConnect();
        $req = $db->prepare('SELECT id, category_Name, path_cat, url_path from categories WHERE id=?');
        // var_dump($req);
        // die();
        $req->execute(array($category_id));
        $categoryId= $req->fetch();
        // var_dump($categoryId);
        // die();
        return $categoryId;
    }
    
    /**
     * Get all Items in DATABASE
     * @return array
     */
    public function getAllItems(): array
    {
        // var_dump('ok');
        // die();
        $db = $this->dbConnect();
        $req = $db->query('SELECT * FROM items ORDER BY id');
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
        $req = $db->prepare('SELECT id, id_seller, category_id, ref, nameItem, descriptionItem, price, size, stock, url_image FROM items WHERE id = ?');
        $req->execute(array($itemId));
        $item = $req->fetch();
        
        return $item;
    }

    /**
     * Get items by category
     * @param int $category_id
     * @return array
     */
    public function getItemsByCategory(int $category_id): array
    {
        // var_dump($category_id);
        // die(); 
        // var_dump('test model');
        // die(); //OK
        $db = $this->dbConnect();
        $req = $db->prepare('SELECT id, id_seller, category_id, ref, nameItem, descriptionItem, price, size, stock, url_img FROM items WHERE category_id = ?');
        $req->execute(array($category_id));
        $itemsByCat = $req->fetch();
        // var_dump($itemsByCat);
        // die();

        return $itemsByCat;
    }


     /**
    * Get all item of one seller
     * @return array retourne un tableau contenant tous les articles d'un vendeur
     * @param int $sellerId
     */
    public function getItemsSeller(int $sellerId): array
    {
        $db = $this->dbConnect();
        $req = $db->prepare('SELECT id, id_seller, category_id, ref, nameItem, descriptionItem, price, size, stock, url_img FROM items WHERE id_seller = ?');
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
     * @param int $category_id $price $stock $itemId
     * @param string $ref, $nameItem, $descriptionItem, $size
     */
    // //Mettre à jour article
    public function updateItem(int $category, string $ref, string $nameItem, string $descriptionItem, int $price,string $size, int $stock, int $itemId): bool
    {
        $db = $this->dbConnect();
        $req = $db->prepare('UPDATE items SET category_id=?, ref=?, nameItem=?,descriptionItem=?, price=?, size=?, stock=? WHERE id=?');
        $req->execute(array($category, $ref, $nameItem, $descriptionItem, $price, $size, $stock, $itemId));
        $itemUpdate = $req->fetch();
        // var_dump($itemUpdate);
        // die(); //boolean false
        return $itemUpdate;
    }
}
