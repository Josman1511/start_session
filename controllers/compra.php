<?php
require "../models/Product.php";
require "../models/Saldo.php";
$connection = new Connection();
$user = $connection->getUser($_SESSION['usuario']);
$userSaldo = $user['saldo'];
$product = new Product;
$currentProduct = $product->currentProduct($_GET['product_id']);
$currentProductPrecio = $currentProduct['precio'];
$saldo = new Saldo();
if($userSaldo >= $currentProductPrecio){
  $saldo->compra($userSaldo, $currentProductPrecio);
  header("location: ../views/compraExitosa.php?product_id=".$_GET['product_id']);
}else{
 header("location: ../views/banco.php");
}
var_dump($userSaldo);
var_dump($currentProductPrecio);
?>
