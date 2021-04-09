<?php
require "../models/Product.php";
require "../models/Saldo.php";
require "../models/Transactions.php";
$connection = new Connection();
$user = $connection->getUser($_SESSION['usuario']);
$userSaldo = $user['saldo'];
$userId = $user['id'];
$product = new Product;
$currentProduct = $product->currentProduct($_GET['product_id']);
$currentProductPrecio = $currentProduct['precio'];
$currentProductName = $currentProduct['articulo'];
$currentProductAmount = $currentProduct['cantidad'];
$saldo = new Saldo();

if ($userSaldo >= $currentProductPrecio) {
    $transaction = new Transactions();
    $buy = 'Compra';
    $commit = 'Compra de ' . $currentProductName;
    $balance = $userSaldo - $currentProductPrecio;
    $productId = $_GET['product_id'];
    $transaction->addNewPurchase($currentProductPrecio, $commit, $balance, $userId, $productId);
    $saldo->compra($userSaldo, $currentProductPrecio);
    $product->restAmountProduct($_GET['product_id'], $currentProductAmount);
    header("location: ../views/compraExistosa2.php?product_id=" . $_GET['product_id']);
} else {
    header("location: ../views/banco.php");
}
var_dump($userSaldo);
var_dump($currentProductPrecio);
?>
