<?php
require_once '../models/ShoppingCar.php';
$shoppingCar = new ShoppingCar();
$product = $shoppingCar->getCurrentProduct($_GET['product_id']);
$productTotalPrice = $product['precio_total'];
$productAmount = $product['amount'];
echo number_format($productTotalPrice, 2, ",", ".");


