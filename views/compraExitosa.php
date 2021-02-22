<?php
require "../models/Product.php";
session_start();
$product = new Product;
$currentProduct = $product->currentProduct($_GET['product_id']);
$currentProductName = $currentProduct['articulo'];
$currentProductPrecio = number_format($currentProduct['precio'], 2, ',', '.');
$connection = new Connection();
$user = $connection->getUser($_SESSION['usuario']);
$saldoUser = number_format($user['saldo'], 2, ',', '.');
$userName = $user['username'];
?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
<style>
    .username{
        background-color: #1981C9;
        font-size: 50px;
        color: white;
        text-align: left;
        margin-left: -8px;
        margin-right: -8px;
        margin-top: -10px;
        padding: 20px;
        font-family: sans-serif;
    }

    .sansSerif{
        font-family: sans-serif;
    }
    .compraExitosa{
        font-size: 60px;
        position: absolute;
        top: 150px;
        left: 130px;
        color: white;


    }
    .compra{
        font-size: 35px;
        position: absolute;
        top: 250px;
        left: 85px;
        color: white;
    }
    .saldo{
        font-size: 40px;
        padding: 15px;
        border-width: 4px;
        width: 620px;
        border-left: 6px solid #1981C9;
        background-color: #c7c7c7;
        position: absolute;
        top: 380px;
        left: 400px;
    }
    .inicio{
        font-size: 30px;
        position: absolute;
        top: 530px;
        left: 620px;
    }
    .cuadroAzul{
        width: 1300px;
        height: 200px;
        position: absolute;
    }


</style>
<h1 class="username"><?=$userName?></h1>
<img  class="cuadroAzul" style="top: 180px; left: 20px" src="../images/cuadrado2.jpg" alt="">
<img style="top: 170px; left: 30px" class="cuadroAzul" src="../images/cuadrado.jpg" alt="">
<div class="sansSerif">
<h1 class="compraExitosa">Su compra ha sido un completo exito</h1>
<h2 class="compra">Usted ha comprado el producto "<?= $currentProductName ?>" por el precio de <?= $currentProductPrecio ?>$</h2>
<h3 class="saldo">Su saldo actual es de <?= $saldoUser ?>$</h3>
<a class="inicio" href="../views/home.php">Ir al inicio</a>
</div>

</body>
</html>
