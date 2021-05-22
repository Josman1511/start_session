<?php
require_once "../models/ShoppingCar.php";
$shoppingPrice = new ShoppingCar();
$totalPrice = $shoppingPrice->getTotalPrice($_SESSION['id']);
echo "<span style='font-weight: normal; color: #c62d2d'> $ ".number_format($totalPrice,2, ",", ".")."</span>";
?>