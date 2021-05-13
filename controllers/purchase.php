<?php
require "../models/Product.php";
require "../models/Balance.php";
require "../models/Transactions.php";
$connection = new Connection();
$user = $connection->getUser($_SESSION['user']);
$userBalance = $user['balance'];
$userId = $user['id'];
$product = new Product;
$currentProduct = $product->getcurrentProduct($_GET['product_id']);
$currentProductPrice = $currentProduct['price'];
$currentProductName = $currentProduct['product'];
$currentProductAmount = $currentProduct['amount'];
$balance = new Balance();

if ($userBalance >= $currentProductPrice) {
    $transaction = new Transactions();
    $buy = 'Compra';
    $comment = 'Compra de ' . $currentProductName;
    $NewUserBalance = $userBalance - $currentProductPrice;
    $productId = $_GET['product_id'];
    $transaction->addNewPurchase($currentProductPrice, $comment, $NewUserBalance ,$userId, $productId);
    $balance->makePurchase($userBalance, $currentProductPrice, $currentProductAmount, $_GET['product_id']);
    header("location: ../views/successfulPurchase.php?product_id=" . $_GET['product_id']);
} else {
    header("location: ../views/bank.php");
}