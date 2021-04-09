<?php
require_once "Connection.php";

class Product
{
    public function getAllProduct(): array
    {
        $connection = new Connection();
        $query = $connection->getPDO()->query("SELECT clases.clase, articulos.id, articulo, precio, image FROM articulos INNER JOIN clases ON articulos.clase_id = clases.id");
        $articulo = $query->fetchAll(PDO::FETCH_ASSOC);
        return $articulo;
    }

    public function currentProduct(int $currentId): array
    {
        $connection = new Connection();
        $query = $connection->getPDO()->prepare("SELECT clases.clase, articulos.id, articulo, precio, image, cantidad FROM articulos INNER JOIN clases ON articulos.clase_id = clases.id WHERE articulos.id = :articulos");
        $query->bindParam('articulos', $currentId);
        $query->execute();
        $currentProduct = $query->fetchAll(PDO::FETCH_ASSOC);
        return (empty($currentProduct)) ? $currentProduct : $currentProduct[0];
    }

    public function getCurrentUserProducts()
    {
        $connection = new Connection();
        $query = $connection->getPDO()->query("SELECT articulos.image, articulos.articulo FROM articulos INNER JOIN transacciones ON v");
    }

    public function restAmountProduct(int $productId, float $productAmount)
    {
        $connection = new Connection();
        $restProductAmount = $productAmount - 1;
        $query = $connection->getPDO()->prepare("UPDATE articulos SET cantidad = :cantidad WHERE id = :id");
        $query->bindParam('cantidad', $restProductAmount);
        $query->bindParam('id', $productId);
        $query->execute();
    }
}