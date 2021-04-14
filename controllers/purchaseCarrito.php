<?php
session_start();
require_once "../models/Carrito.php";
$carrito = new Carrito();
$carrito->makePurchase($_SESSION['id']);
header("location: ../views/carritoCompras.php");
