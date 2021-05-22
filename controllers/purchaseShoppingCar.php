<?php
require_once "../models/ShoppingCar.php";
$carrito = new ShoppingCar();
$carrito->makePurchase($_SESSION['id']);
header("location: ../views/ShoppingCar.php");
