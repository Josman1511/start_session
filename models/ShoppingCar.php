<?php
require_once "Product.php";
require_once "Connection.php";
require_once "Balance.php";
require_once "Transactions.php";
class ShoppingCar
{
    public function addToShoppingCar(int $ProductId, int $userId)
    {
        $productClass = new Product();
        $connection = new Connection();
        $currentProduct = $productClass->currentProduct($ProductId);
        $productName = $currentProduct['articulo'];
        $productPrice = $currentProduct['precio'];
        $productAmount = 1;
        $productTotalPrice = $currentProduct['precio'];
        $query = "INSERT INTO carrito (product, purchase, amount, user_id, precio_total) VALUES (:product, :purchase, :amount, :user_id, :precio_total)";
        $add = $connection->getPDO()->prepare($query);
        $add->bindParam('product', $productName);
        $add->bindParam('purchase', $productPrice);
        $add->bindParam('amount', $productAmount);
        $add->bindParam('user_id', $userId);
        $add->bindParam('precio_total', $productTotalPrice);
        $add->execute();
    }

    public function getCurrentProducts(int $currentUserId): array
    {
        $connection = new Connection();
        $query = $connection->getPDO()->prepare(
            "SELECT * FROM carrito WHERE user_id = :user_id");
        $query->bindParam('user_id', $currentUserId);
        $query->execute();
        $product = $query->fetchAll(PDO::FETCH_ASSOC);
        return $product;
    }

    public function deleteProductToShoppingCar(int $productId)
    {
        $connection = new Connection();
        $query = $connection->getPDO()->prepare('DELETE FROM carrito WHERE carrito.id = :id');
        $query->bindParam('id', $productId);
        $query->execute();
    }

    public function getCurrentProduct(int $productId): array
    {
        $connection = new Connection();
        $query = $connection->getPDO()->prepare('SELECT * FROM carrito WHERE id = :id');
        $query->bindParam('id', $productId);
        $query->execute();
        $product = $query->fetchAll(PDO::FETCH_ASSOC);
        return $product[0];
    }

    private function changeAmountProduct(int $productId, int $plusOrMenos)
    {
        $connection = new Connection();
        $product = $this->getCurrentProduct($productId);
        $productAmount = $product['amount'];
        $productPrice = $product['purchase'];
        if (1 == $plusOrMenos) {
            $amount = $productAmount + 1;

        } elseif (2 == $plusOrMenos) {
            if (1 == $productAmount) {
                throw new Exception('la cantidad de productos no puede ser 0');
            }
            $amount = $productAmount - 1;
        }
        $productTotalPrice = $productPrice * $amount;
        $query = $connection->getPDO()->prepare('UPDATE carrito SET amount = :amount, precio_total = :precio_total WHERE id = :id');
        $query->bindParam('amount', $amount);
        $query->bindParam('id', $productId);
        $query->bindParam('precio_total', $productTotalPrice);
        $query->execute();
    }

    public function addAmountProduct(int $productId)
    {
        return $this->changeAmountProduct($productId, 1);
    }

    public function subAmountProduct(int $productId)
    {
        return $this->changeAmountProduct($productId, 2);
    }

    public function deleteAllFromCarrito(int $userId)
    {
        $connection = new Connection();
        $query = $connection->getPDO()->prepare('DELETE FROM carrito WHERE user_id = :id');
        $query->bindParam('id', $userId);
        $query->execute();
    }

    public function getTotalPrice(int $userId): float{
        $connection = new Connection();
        $query = $connection->getPDO()->prepare("SELECT SUM(precio_total) AS sumPrecioTotal FROM carrito WHERE user_id = :user_id");
        $query->bindParam('user_id', $userId);
        $query->execute();
        $sum = $query->fetchAll(PDO::FETCH_ASSOC);
        $TotalPrice = $sum[0]['sumPrecioTotal'];
        return (empty($TotalPrice) ? "0" : $TotalPrice);
    }
    public function makePurchase (int $userId){
        $connection = new Connection();
        $transaction = new Transactions();
        $user = $connection->getUser($_SESSION['user']);
        $userBalance = $user['saldo'];
        $objectBalance = new Balance();
        $purchasePrice = $this->getTotalPrice($userId);
        $objectBalance->purchase($userBalance, $purchasePrice);
        $this->deleteAllFromCarrito($userId);
    }
//public function PurchaseFromCarrito (int $productId, int $userId){
//    $product = $this->getCurrentArticules($userId);
//    $product =
//
//}
}