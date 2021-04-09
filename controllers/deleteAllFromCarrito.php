<?php
require_once "../models/Carrito.php";
require_once "../models/Connection.php";
session_start();
$connection = new Connection();
$user = $connection->getUser($_SESSION['usuario']);
$userId = $user['id'];
$carrito = new Carrito();
$carrito->deleteAllFromCarrito($userId);
header('location: ../views/carritoCompras.php')
?>