<?php
require_once "../models/Carrito.php";
session_start();
$carrito = new Carrito();
$product = $carrito->getCurrentProduct($_GET['product_id']);
$productAmount = $product['amount'];
if (2 == $_GET['subOrPlus']) {
    $carrito->addAmountProduct($_GET['product_id']);
    echo $productAmount + 1;
} elseif (1 == $_GET['subOrPlus']) {
   $carrito->subAmountProduct($_GET['product_id']);
   echo $productAmount - 1;
}

?>
