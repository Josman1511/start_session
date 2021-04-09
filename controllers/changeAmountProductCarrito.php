<?php
require_once "../models/Carrito.php";
$Carrito = new Carrito();
$Carrito->changeAmountProduct(37, 2);
$product = $Carrito->getCurrentProduct(37);
?>
