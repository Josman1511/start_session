<?php
require_once "../models/ShoppingCar.php";
require_once "../models/Connection.php";
session_start();
$connection = new Connection();
$user = $connection->getUser($_SESSION['usuario']);
$userId = $user['id'];
$shoppingCar = new ShoppingCar();
$addToShoppingCar = $shoppingCar->addToShoppingCar($_GET['product_id'], $userId);
header("location: ../views/ShoppingCar.php");
?>