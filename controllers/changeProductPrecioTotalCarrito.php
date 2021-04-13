<?php
require_once '../models/Carrito.php';
$carrito = new Carrito();
$product = $carrito->getCurrentProduct($_GET['product_id']);
$productPrecioTotal = $product['precio_total'];
$productAmount = $product['amount'];
echo number_format($productPrecioTotal, 2, ",", ".");


