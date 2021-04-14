<?php
require_once "../models/Carrito.php";
$carrito = new Carrito();
$totalPrice = $carrito->getTotalPrice($_SESSION['id']);
echo "<span style='font-weight: normal; color: #c62d2d'> $ ".number_format($totalPrice,2, ",", ".")."</span>";
?>