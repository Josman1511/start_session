<?php
require_once "../models/Carrito.php";
session_start();
$carrito = new Carrito();
$totalPrice = $carrito->getTotalPrice($_SESSION['id']);
echo number_format($totalPrice,2, ",", ".");
?>