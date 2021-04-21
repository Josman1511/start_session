<?php
require_once "Connection.php";
session_start();
class Balance
{
    public function deposit(float $deposit): float{
        $connection = new Connection();
        $user = $connection->getUser($_SESSION['usuario']);
        $saldo = $user['saldo'];
        $id = $user['id'];
        $sum = $saldo + $deposit;
        $query = "UPDATE usuarios SET saldo = :saldo WHERE id = :id";
        $deposit = $connection->getPDO()->prepare($query);
        $deposit->bindParam(':saldo',$sum);
        $deposit->bindParam(':id',$id);
        $deposit->execute();
        return $sum;
    }
    public function purchase(float $currentUserSaldo, float $productPrecio): float{
        $connection = new Connection();
        $usuario = $connection->getUser($_SESSION['usuario']);
        $id = $usuario['id'];
        $resta = $currentUserSaldo - $productPrecio;
        $consulta = "UPDATE usuarios SET saldo = :saldo WHERE id = :id";
        $compra = $connection->getPDO()->prepare($consulta);
        $compra->bindParam('saldo', $resta);
        $compra->bindParam('id', $id);
        $compra->execute();
        return $resta;
    }
}