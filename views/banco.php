<?php
session_start();
require "../models/Connection.php";
$connection = new Connection();
$usuario = $connection->getUser($_SESSION['usuario']);
$saldo = number_format($usuario['saldo'], 2, ',', '.');
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

        .usuario{
            position: absolute;
            top: -35px;
            left: 0px;
            background-color: #1981C9;
            width: 1306px;
            padding: 30px;
            font-family: sans-serif;
            font-size: 40px;
            color: white;
        }
        .saldo{
            position: absolute;
            top: 100px;
            left: 360px;
            border-width: 7px ;
            width: 580px;
            padding: 30px;
            border-left: 6px solid #1981C9;
            background-color: lightgrey;
            font-size: 30px;
            font-family: sans-serif;
        }
        .cuadro{
            position: absolute;
            width: 400px;
            height: 300px;
        }
    </style>
    <h1 class="usuario"><?= $_SESSION['usuario']?></h1>
    <h2 class="saldo"> Su saldo actualemente es de <?= $saldo ?>$ </h2>
    <img style="top:280px; left: 460px" class="cuadro" src="../images/cuadrado2.jpg" alt="">
    <img style="top:270px; left: 470px" class="cuadro" src="../images/cuadrado.jpg" alt="">
    <a title="deposito" href="deposito.php"><img style="position: absolute; top: 290px; left: 560px; width: 200px; height: auto;" src="../images/deposito.png" alt="deposito">
    <a style="color: white; font-family: sans-serif; font-size:35px; position: absolute; top: 520px; left: 590px;" href="deposito.php">Depositar</a>
</body>
</html>
