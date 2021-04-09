<?php
require_once "Product.php";
require_once "Connection.php";
class Carrito
{
public function addToCarrito(int $ProductId, int $userId){
$productClass = new Product();
$connection = new Connection();
$currentProduct = $productClass->currentProduct($ProductId);
$productName = $currentProduct['articulo'];
$productPrecio = $currentProduct['precio'];
$productAmount = 1;
$query = "INSERT INTO carrito (product, purchase, amount, user_id) VALUES (:product, :purchase, :amount, :user_id)";
$add = $connection->getPDO()->prepare($query);
$add->bindParam('product', $productName);
$add->bindParam('purchase', $productPrecio);
$add->bindParam('amount', $productAmount);
$add->bindParam('user_id', $userId );
$add->execute();
}
public function getCurrentArticules(int $currentUserId): array{
$connection = new Connection();
$query = $connection->getPDO()->prepare(
    "SELECT id, product, purchase, amount FROM carrito WHERE user_id = :user_id");
$query->bindParam('user_id', $currentUserId);
$query->execute();
$product = $query->fetchAll(PDO::FETCH_ASSOC);
return $product;
}
public function EliminateProductToCarrito(int $productId){
    $connection = new Connection();
    $query = $connection->getPDO()->prepare('DELETE FROM carrito WHERE carrito.id = :id');
    $query->bindParam('id', $productId);
    $query->execute();
}
public function getCurrentProduct(int $productId): array{
    $connection = new Connection();
    $query = $connection->getPDO()->prepare('SELECT * FROM carrito WHERE id = :id');
    $query->bindParam('id', $productId);
    $query->execute();
    $product = $query->fetchAll(PDO::FETCH_ASSOC);
    return $product[0];
}
public function changeAmountProduct(int $productId, int $plusOrMenos){
    $connection = new Connection();
    $product = $this->getCurrentProduct($productId);
    $productAmount = $product['amount'];
    if(1 == $plusOrMenos){
        $amount = $productAmount + 1;
    }
    elseif (2 == $plusOrMenos){
        $amount = $productAmount - 1;
    }
    $query = $connection->getPDO()->prepare('UPDATE carrito SET amount = :amount WHERE id = :id');
    $query->bindParam('amount', $amount);
    $query->bindParam('id', $productId);
    $query->execute();
}
public function deleteAllFromCarrito(int $userId){
    $connection = new Connection();
    $query = $connection->getPDO()->prepare('DELETE FROM carrito WHERE user_id = :id');
    $query->bindParam('id', $userId);
    $query->execute();
}
//public function PurchaseFromCarrito (int $productId, int $userId){
//    $product = $this->getCurrentArticules($userId);
//    $product =
//
//}
}