<?php
session_start();
require "../models/Connection.php";
$connection = new Connection();
$user = $connection->getUser($_SESSION['usuario']);
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
    <link rel="stylesheet" href="../public/css/bootstrap.min.css" crossorigin="anonymous">
</head>
<body>
<nav class="navbar navbar-expand-lg navbar-dark bg-danger">
    <div class="container-fluid">
        <a class="navbar-brand" href="#"><img src="../images/HeroStore.png" alt="" width="70"></a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarText"
                aria-controls="navbarText" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarText">
            <ul class="navbar-nav me-auto mb-2 mb-lg-0">

                <li class="nav-item">
                    <a class="nav-link active">Usuario: <?= $userName ?></a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" aria-current="page" href="home.php">Atras</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="../controllers/close_session.php">Cerrar sesion</a>
                </li>
            </ul>
            <span class="navbar-text">
      </span>
        </div>
    </div>
</nav>
<div class="container-fluid row mt-md-5">
    <div class="col-md-2"></div>
    <div class="col-md-8 mt-md-5">
        <div class="alert alert-danger text-center mt-md-5" role="alert">
            <h4 style="font-size: 40px" class="alert-danger">Su compra ha sido un completo exito</h4>
            <h4>Usted ha comprado un -producto- por el precio de -precio-</h4>
            <hr>
            <a href="home.php" class="mb-0">Volver al inicio</a>
        </div>
    </div>
    <div class="col-md-2"></div>
</div>
<!--JS-->
<script src="../public/js/bootstrap.esm.js"></script>
<script src="../public/js/bootstrap.min.js"></script>
</body>
</html>
