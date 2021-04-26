<?php
session_start();
require "../models/Connection.php";
$connection = new Connection();
$user = $connection->getUser($_SESSION['user']);
$userBalance = number_format($user['saldo'], 2, ',', '.');
?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link rel="stylesheet" href="../public/css/bootstrap.min.css" crossorigin="anonymous">
</head>
<body>
<div class="container-fluid">
    <div class="row mt-md-5">
        <div class="col-md-2"></div>
        <div class=" col-md-8 mt-md-5">
            <div class="alert alert-danger" role="alert">
                <h1 class=" text-center alert-danger">Deposito Exitoso</h1>
                <h3 style="font-weight: normal" class="text-center">Su deposito ha sido un completo exito ahora usted cuenta con <?= $userBalance ?>$ de saldo.</h3>
                <hr>
                <h4 class="mb-0 text-center"><a href="bank.php">Volver al banco</a></h4>
            </div>
        </div>
    </div>
</div>
<div class="col-md-2"></div>
<!--JS-->
<script src="../public/js/bootstrap.esm.js"></script>
<script src="../public/js/bootstrap.min.js"></script>
</body>
</html>
