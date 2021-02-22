<?php
require "../models/Product.php";
session_start();
$products = new Product();
$currentProduct = $products->currentProduct($_GET['product_id']);
$connection = new Connection();
$usuario = $connection->getUser($_SESSION['usuario']);
$saldo = number_format($usuario['saldo'], 2, ',', '.');
$precioProduct = number_format($currentProduct['precio'], 2, ',', '.');
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
    .nameProduct{
        font-family: sans-serif;
        font-size: 50px;
        background-color: #1981C9;
        position: absolute;
        left: 0px;
        top: -40px;
        padding: 20px;
        width: 1326px;
        color: white;
    }
    .imagenProduct{
        width: 400px;
        height: auto;
        position: absolute;
        top: 130px;
        left: 100px;
    }
    .imageCuadro{
        width: 400px;
        height: auto;
        position: absolute;
    }
    .precioImage{
        position: absolute;
        bottom: 10px;
        left: 120px;
        width: 70px;
        height: auto;
    }
    .precio{
        position: absolute;
        bottom: -35px;
        left: 200px;
        font-family: sans-serif;
        font-size: 60px;
        color: #1981C9;
    }
    .logoAzul{
        position: absolute;
        top: 5px;
        right: 10px;
        width: 200px;
        height: auto;
    }
    .msjTienda{
        position: absolute;
        top: 100px;
        left: 650px;
        font-family: sans-serif;
        width: 300px;
        font-size: 30px;
    }
</style>
    <h3 class="msjTienda">Recuerde que tenemos lo mejor en <?= $currentProduct['clase']?> si este producto no le convence, puede volver a la
        <a href="tienda.php">tienda</a>, para seguir viendo nuestros productos de la mejor calidad</h3>
    <h2 class="precio"><?=$precioProduct?> $ </h2>
    <h1  class="nameProduct"><?=$currentProduct['articulo']?></h1>
    <img style="top: 130px; left:90px" class="imageCuadro" src="../images/cuadrado_gray2.jpg" alt="">
    <img style="top: 120px; left:100px" class="imageCuadro" src="../images/cuadrado_gray.jpg" alt="">
    <img class="imagenProduct" src="../images/products/<?=$currentProduct['image']?>" alt="">
    <img class="precioImage" src="../images/precio.png">
    <img style="position: absolute; right: 10px; top: 100px; width: 250px; height: 360px" src="../images/cuadrado2.jpg" alt="">
    <img class="logoAzul" src="../Logo_Azul%20-%20copia.jpg" alt="">
    <img style="position: absolute; top:400px; right: 200px; width: 70px; height: auto;" src="../images/advertencia.png" alt="">
    <p style="color:white; font-size: 30px; font-family: sans-serif; position: absolute; top:100px; right: 100px; width: 150px; height: auto;">Estimado(a) <?= $_SESSION["usuario"]?>, usted actualmente cuenta con <?=$saldo?>$ de saldo</p>
    <form action="../controllers/compra.php?product_id=<?=$currentProduct['id']?>" method="post">
        <input style="padding: 20px;  background-color: #1981C9; color:white;font-family: sans-serif; font-size: 40px; position: absolute; bottom: 40px; right: 30px;" type="submit" name="compra" value="Comprar">
    </form>
</body>
</html>