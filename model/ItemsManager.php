<?php

namespace P5\model;

use \P5\model\Manager;

class ItemsManager extends Manager
{
    /**
     * Add item in DATABASE
     * @param string $ref
     * @param string $nameItem
     * @param string $descriptionItem
     * @param string $size
     * @param string $path
     * @param int $id_seller
     * @param int $category
     * @param int $price
     * @param int $stock
     */
    public function createItem(int $id_seller, int $category, string $ref, string $nameItem, string $descriptionItem, int $price, string $size, int $stock, string $path): void
    {
        $db = $this->dbConnect();
        $addItem = $db->prepare('INSERT INTO items (id_seller, category_id, ref, nameItem, descriptionItem, price, size, stock, url_img) VALUES (?,?,?,?,?,?,?,?,?)');
        $addItem->execute(array($id_seller, $category, $ref, $nameItem, $descriptionItem, $price, $size, $stock, $path));
    }

    /**
     * Get all Categories
     * @return array
     */
    public function getAllCategories(): array
    {
        $db = $this->dbConnect();
        $req = $db->query('SELECT * FROM categories');
        $categories = $req->fetchAll();

        return $categories;
    }

    /**
     * Get all Items in DATABASE
     * @return array
     */
    public function getAllItems(): array
    {
        $db = $this->dbConnect();
        $req = $db->query('SELECT * FROM items ORDER BY id');
        $items = $req->fetchAll();

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
        $refs = $req->fetchAll();

        return $refs;
    }

    /**
     * Get categories by id
     * @param int $category_id
     * @return array
     */
    public function getCategoryById(int $category_id): array
    {
        $db = $this->dbConnect();
        $req = $db->prepare('SELECT id, category_Name, path_cat, url_path FROM categories WHERE id=?');
        $req->execute(array($category_id));
        $categoryId = $req->fetch();

        return $categoryId;
    }

    /**
     * Get item by id
     * @param int $itemId
     * @return array tableau avec toutes les informations d'un article selon son id
     */
    public function getItem(int $itemId): array
    {
        $db = $this->dbConnect();
        $req = $db->prepare('SELECT * FROM items WHERE id = ?');
        $req->execute(array($itemId));
        $item = $req->fetchAll();
        // var_dump($item);
        // die();
        return $item;
    }

    /**
     * Get items by category
     * @param int $category_id
     * @return array
     */
    public function getItemsByCategory(int $category_id): array
    {
        $db = $this->dbConnect();
        $req = $db->prepare('SELECT * FROM items WHERE category_id = ?');
        $req->execute(array($category_id));
        $itemsByCat = $req->fetchAll();

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
     * Get random id by items
     * @return array with 3 items randoms
     */
    public function randomItems(): array
    {
        $db = $this->dbConnect();
        $req = $db->query('SELECT * FROM items ORDER BY rand() LIMIT 3');
        $randomItem = $req->fetchAll();

        return $randomItem;
    }

    /**
     * Delete item by id
     * @param int $itemId
     * @return ...
     */
    // Sup article
    public function removeItem(int $itemId): void
    {
        $db = $this->dbConnect();
        $req = $db->prepare('DELETE FROM items WHERE id=?');
        $req->execute(array($itemId));
        $deleted = $req->fetch();
    }

    /**
     * Update item
     * @return bool
     * @param int $price 
     * @param int $stock 
     * @param int $itemId
     * @param string $ref
     * @param string $nameItem
     * @param string $descriptionItem
     * @param string $size
     */
    // //Mettre à jour article
    public function updateItem(string $ref, string $nameItem, string $descriptionItem, int $price, string $size, int $stock, int $itemId): bool
    {
        $db = $this->dbConnect();
        $req = $db->prepare('UPDATE items SET ref=?, nameItem=?,descriptionItem=?, price=?, size=?, stock=? WHERE id=?');
        $req->execute(array($ref, $nameItem, $descriptionItem, $price, $size, $stock, $itemId));
        $itemUpdate = $req->fetch();

        return $itemUpdate;
    }
}
