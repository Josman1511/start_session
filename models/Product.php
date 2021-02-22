<?php
require "Connection.php";
class Product
{
    public function getAllProduct(): array{
        $connection = new Connection();
        $query = $connection->getPDO()->query("SELECT clases.clase, articulos.id, articulo, precio, image FROM articulos INNER JOIN clases ON articulos.clase_id = clases.id");
        $articulo = $query->fetchAll(PDO::FETCH_ASSOC);
        return $articulo;
        }
    public function currentProduct(int $currentId): array
    {
        $connection = new Connection();
        $query = $connection->getPDO()->query("SELECT clases.clase, articulos.id, articulo, precio, image FROM articulos INNER JOIN clases ON articulos.clase_id = clases.id WHERE articulos.id ='" . $currentId . "' ");
        $currentProduct = $query->fetchAll(PDO::FETCH_ASSOC);
        return $currentProduct[0];
    }
}