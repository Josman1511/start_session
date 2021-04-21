<?php
require_once "Connection.php";

class Transactions
{
    public function getCurrentUserTransactions(int $currentUserId): array
    {
        $connection = new Connection();
        $query = $connection->getPDO()->prepare(
            "SELECT clase, monto, comentario, balance FROM transacciones WHERE user_id = :user_id");
        $query->bindParam('user_id', $currentUserId);
        $query->execute();
        $transactions = $query->fetchAll(PDO::FETCH_ASSOC);
        return $transactions;
    }

    public function addNewDeposit(float $amountMoney, string $commit, float $balance, int $user_id)
    {
        $this->addNewTransaction('DEPOSITO', $amountMoney, $commit, $balance, $user_id, null);
    }

    public function addNewPurchase(float $amountMoney, string $commit, float $balance, int $user_id, int $product_id)
    {
        $this->addNewTransaction('COMPRA', $amountMoney, $commit, $balance, $user_id, $product_id);
    }

    private function addNewTransaction(string $class, float $amountMoney, string $commit, float $balance, int $user_id, $product_id)
    {
        $connection = new Connection();
        $consulta = 'INSERT INTO transacciones (clase, monto, comentario, balance, user_id, product_id) VALUES (:clase, :monto, :comentario, :balance, :user_id, :product_id)';
        $deposito = $connection->getPDO()->prepare($consulta);
        $deposito->bindParam('clase', $class);
        $deposito->bindParam('monto', $amountMoney);
        $deposito->bindParam('comentario', $commit);
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
            "SELECT ar.image, ar.articulo, tr.id, tr.clase, tr.monto, tr.comentario, tr.balance, tr.product_id FROM transacciones AS tr LEFT JOIN articulos AS ar ON tr.product_id = ar.id WHERE clase = :clase AND user_id =  :user_id");
        $query->bindParam('clase', $class);
        $query->bindParam('user_id', $currentUserId);
        $query->execute();
        $transactions = $query->fetchAll(PDO::FETCH_ASSOC);
        return $transactions;
    }
}