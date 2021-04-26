<?php
require_once "../models/ShoppingCar.php";
$shoppingCar = new ShoppingCar();
$product = $shoppingCar->getCurrentProduct($_GET['product_id']);
$productAmount = $product['amount'];
if (2 == $_GET['subOrSum']) {
    $shoppingCar->addAmountProduct($_GET['product_id']);
    echo $productAmount + 1;
} elseif (1 == $_GET['subOrSum']) {
   $shoppingCar->subAmountProduct($_GET['product_id']);
   echo $productAmount - 1;
}

?>
