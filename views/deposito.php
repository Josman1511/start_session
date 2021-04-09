<?php
session_start();
require "../models/Connection.php";
$connection = new Connection();
$user = $connection->getUser($_SESSION['usuario']);
$userName = $user['username']
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
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarText" aria-controls="navbarText" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarText">
            <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                </li>
                <li class="nav-item">
                    <a class="nav-link active">Usuario: <?=$userName?></a>
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
<div class="container-fluid">
<div class="row mt-sm-5">
    <div class="col-sm-4"></div>
    <div class="col-md-4 mt-md-5">
        <h2 class="text-center">¿Cuanto desea depositar?</h2>
        <form action="../controllers/depositoLogica.php" method="post">
            <div class="mb-3">
                <label for="exampleInputEmail1" class="form-label"></label>
                <input type="number" name="dinero" placeholder="Monto" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">

            </div>
            <div class="mb-3">
                <div class="form-floating">
                    <textarea name="comentario" class="form-control" placeholder="Leave a comment here" id="floatingTextarea2" style="height: 100px"></textarea>
                    <label for="floatingTextarea2">Comentario</label>
                </div>
                <div id="emailHelp" class="form-text">Intente colocar un comentario descriptivo.</div>
            </div>
            <div class="text-center ">
            <button type="submit" class="btn btn-danger">Enviar deposito</button>
            </div>
        </form>
    </div>
    <div class="col-sm-4"></div>
</div>
</div>
<!--
<h2 class="cuanto">Cuanto desea depositar a </h2>
<h1 class="usuario"></h1>
<form action="../controllers/depositoLogica.php" method="post" autocomplete="off">
    <input style="position: absolute; top: 400px; type=" class="depositar" type="text" name="comentario" placeholder="Comentario" required>
    <input class="depositar" type="number" min="0" name="dinero" placeholder="Monto" required>
    <input class="submit" type="submit" value="Depositar" >
</form>
<img class="dollar" src="../images/dollar.png" alt="">
<img class="azulLogo" src="../images/Logo_Azul.jpg" alt="">
<img class="comentario" src="../images/commit.png" alt="">
-->
<script src="../public/js/bootstrap.esm.js"></script>
<script src="../public/js/bootstrap.min.js"></script>
</body>
</html>
