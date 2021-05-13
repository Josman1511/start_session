<?php
session_start();
require "../models/Connection.php";
$connection = new Connection();
$user = $connection->getUser($_SESSION['user']);
$userName = $user['username'];
$balance = number_format($user['balance'], 2, ',', '.');
?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link rel="stylesheet" href="../public/css/bootstrap.min.css" crossorigin="anonymous">

</head>
<body>
<!--NAVBAR-->

<nav class="navbar navbar-expand-lg navbar-dark bg-danger">
    <div class="container-fluid">
        <a class="navbar-brand" href="#"><img src="../images/HeroStore.png" alt="" width="70"></a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarText" aria-controls="navbarText" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarText">
            <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                <li class="nav-item">
                    <a class="nav-link active">Su saldo actualmente es de: <?=$balance?>$</a>
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


<!--TARJETAS -->
<div class="container-fluid">
    <div class="row mt-sm-4 m-md-3">
        <div class="col-md-6">
            <div class="card text-center">
                <img src="../images/historial.png" class="card-img-top" alt="..." >
                <div class="card-body">
                    <h5 class="card-title">DEPOSITO</h5>
                    <p class="card-text">Depositar dinero a la tienda para poder realizar compras</p>
                    <a href="deposit.php" class="btn btn-danger ">Realizar un deposito</a>
                </div>
            </div>
        </div>
        <div class="col-md-6 align-content-center">
            <div class="card text-center" >
                <img src="../images/transaccion.jpg"  class="card-img-top" alt="..." >
                <div class="card-body">
                    <h5 class="card-title">HISTORIAL DE TRANSACCIONES <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-graph-up" viewBox="0 0 16 16">
                            <path fill-rule="evenodd" d="M0 0h1v15h15v1H0V0zm10 3.5a.5.5 0 0 1 .5-.5h4a.5.5 0 0 1 .5.5v4a.5.5 0 0 1-1 0V4.9l-3.613 4.417a.5.5 0 0 1-.74.037L7.06 6.767l-3.656 5.027a.5.5 0 0 1-.808-.588l4-5.5a.5.5 0 0 1 .758-.06l2.609 2.61L13.445 4H10.5a.5.5 0 0 1-.5-.5z"/>
                        </svg></h5>
                    <p class="card-text">Ver el historial de compras y depositos en la tienda </p>
                    <a href="historyTransactions.php" class="btn btn-danger">Ver el historial de transacciones </a>
                </div>
            </div>
        </div>
    </div>
</div>
<!--PRODUCTOS-->
<script src="../public/js/bootstrap.esm.js"></script>
<script src="../public/js/bootstrap.min.js"></script>
</body>
</html>

