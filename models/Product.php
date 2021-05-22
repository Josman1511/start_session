<?php
require_once "Connection.php";

class Product
{
    public function getAllProduct(): array
    {
        $connection = new Connection();
        $query = $connection->getPDO()->query("SELECT products_class.class, products.id, product, price, image FROM products INNER JOIN products_class ON products.class_id = products_class.id");
        $product = $query->fetchAll(PDO::FETCH_ASSOC);
        return $product;
    }

    public function getCurrentProduct(int $currentId): array
    {
        $connection = new Connection();
        $query = $connection->getPDO()->prepare("SELECT products_class.class, products.id, product, price, image, amount FROM products INNER JOIN products_class ON products.class_id = products_class.id WHERE products.id = :product");
        $query->bindParam('product', $currentId);
        $query->execute();
        $currentProduct = $query->fetchAll(PDO::FETCH_ASSOC);
        return (empty($currentProduct)) ? $currentProduct : $currentProduct[0];
    }

    public function getCurrentUserProducts()
    {
        $connection = new Connection();
        $query = $connection->getPDO()->query("SELECT products.image, products.product FROM products INNER JOIN transacciones ON v");
    }

    public function subAmountProduct(int $productId, float $productAmount)
    {
        $connection = new Connection();
        $restProductAmount = $productAmount - 1;
        $query = $connection->getPDO()->prepare("UPDATE products SET amount = :amount WHERE id = :id");
        $query->bindParam('amount', $restProductAmount);
        $query->bindParam('id', $productId);
        $query->execute();
    }
}