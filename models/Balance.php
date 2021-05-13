<?php
require_once "Connection.php";
session_start();
class Balance
{
    public function deposit(float $deposit): float{
        $connection = new Connection();
        $user = $connection->getUser($_SESSION['user']);
        $saldo = $user['balance'];
        $id = $user['id'];
        $sum = $saldo + $deposit;
        $query = "UPDATE users SET balance = :balance WHERE id = :id";
        $deposit = $connection->getPDO()->prepare($query);
        $deposit->bindParam('balance',$sum);
        $deposit->bindParam('id',$id);
        $deposit->execute();
        return $sum;
    }
    public function makePurchase(float $currentUserBalance, float $productPrice, float $productAmount, int $productId): float{
        $connection = new Connection();
        $product = new Product();
        $user = $connection->getUser($_SESSION['user']);
        $id = $user['id'];
        $sub = $currentUserBalance - $productPrice;
        $query = "UPDATE users SET balance = :balance WHERE id = :id";
        $purchase = $connection->getPDO()->prepare($query);
        $purchase->bindParam('balance', $sub);
        $purchase->bindParam('id', $id);
        $purchase->execute();
        $subAmountProducts = $product->subAmountProduct($productId, $productAmount);
        return $sub;
    }

}