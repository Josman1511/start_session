<?php
require_once "../models/ShoppingCar.php";
require_once "../models/Connection.php";
session_start();
$connection = new Connection();
$user = $connection->getUser($_SESSION['user']);
$userId = $user['id'];
$shoppingCar = new ShoppingCar();
$shoppingCar->deleteAllFromCarrito($userId);
header('location: ../views/ShoppingCar.php')
?>