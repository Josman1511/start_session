<?php
require "../models/Product.php";
require "../models/Balance.php";
require "../models/Transactions.php";
$connection = new Connection();
$user = $connection->getUser($_SESSION['user']);
$userBalance = $user['saldo'];
$userId = $user['id'];
$product = new Product;
$currentProduct = $product->currentProduct($_GET['product_id']);
$currentProductPrice = $currentProduct['precio'];
$currentProductName = $currentProduct['articulo'];
$currentProductAmount = $currentProduct['cantidad'];
$balance = new Balance();

if ($userBalance >= $currentProductPrice) {
    $transaction = new Transactions();
    $buy = 'Compra';
    $commit = 'Compra de ' . $currentProductName;
    $balance = $userBalance - $currentProductPrice;
    $productId = $_GET['product_id'];
    $transaction->addNewPurchase($currentProductPrice, $commit, $balance, $userId, $productId);
    $balance->purchase($userBalance, $currentProductPrice);
    $product->restAmountProduct($_GET['product_id'], $currentProductAmount);
    header("location: ../views/successfulPurchase.php?product_id=" . $_GET['product_id']);
} else {
    header("location: ../views/bank.php");
}