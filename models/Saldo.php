<?php
require_once "Connection.php";
session_start();
class Saldo
{
    public function deposito(float $deposito): float{
        $connection = new Connection();
        $user = $connection->getUser($_SESSION['usuario']);
        $saldo = $user['saldo'];
        $id = $user['id'];
        $suma = $saldo + $deposito;
        $consulta = "UPDATE usuarios SET saldo = :saldo WHERE id = :id";
        $deposito = $connection->getPDO()->prepare($consulta);
        $deposito->bindParam(':saldo',$suma);
        $deposito->bindParam(':id',$id);
        $deposito->execute();
        return $suma;
    }
    public function compra(float $currentUserSaldo, float $productPrecio): float{
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