<?php
require_once "Connection.php";

class Transactions
{
    public function getCurrentUserTransactions(int $currentUserId): array
    {
        $connection = new Connection();
        $query = $connection->getPDO()->prepare(
            "SELECT class, amount_money, comment, balance FROM transactions WHERE user_id = :user_id");
        $query->bindParam('user_id', $currentUserId);
        $query->execute();
        $transactions = $query->fetchAll(PDO::FETCH_ASSOC);
        return $transactions;
    }

    public function addNewDeposit(float $amountMoney, string $comment, float $balance, int $user_id)
    {
        $this->addNewTransaction('DEPOSITO', $amountMoney, $comment, $balance, $user_id, null);
    }

    public function addNewPurchase(float $amountMoney, string $comment, float $balance, int $user_id, int $product_id)
    {
        $this->addNewTransaction('COMPRA', $amountMoney, $comment, $balance, $user_id, $product_id);
    }

    private function addNewTransaction(string $class, float $amountMoney, string $comment, float $balance, int $user_id, $product_id)
    {
        $connection = new Connection();
        $consulta = 'INSERT INTO transactions (class, amount_money, comment, balance, user_id, product_id) VALUES (:class, :amount_money, :comment, :balance, :user_id, :product_id)';
        $deposito = $connection->getPDO()->prepare($consulta);
        $deposito->bindParam('class', $class);
        $deposito->bindParam('amount_money', $amountMoney);
        $deposito->bindParam('comment', $comment);
        $deposito->bindParam('balance', $balance);
        $deposito->bindParam('user_id', $user_id);
        $deposito->bindParam('product_id', $product_id);
        $deposito->execute();
    }

    public function getCurrentUserPurchases(int $currentUserId): array
    {
        return $this->getCurrentUserTrasactionByClass($currentUserId, 'COMPRA');
    }

    public function getCurrentUserDeposit(int $currentUserId)
    {
        return $this->getCurrentUserTrasactionByClass($currentUserId, 'DEPOSITO');
    }

    private function getCurrentUserTrasactionByClass(int $currentUserId, string $class)
    {
        $connection = new Connection();
        $query = $connection->getPDO()->prepare(
            "SELECT ar.image, ar.product, tr.id, tr.class, tr.amount_money, tr.comment, tr.balance, tr.product_id FROM transactions AS tr LEFT JOIN products AS ar ON tr.product_id = ar.id WHERE class = :class AND user_id =  :user_id");
        $query->bindParam('class', $class);
        $query->bindParam('user_id', $currentUserId);
        $query->execute();
        $transactions = $query->fetchAll(PDO::FETCH_ASSOC);
        return $transactions;
    }
}