<?php
session_start();
require "../models/Connection.php";
$connection = new Connection();
$user = $connection->getUser($_SESSION['usuario']);
$userName = $user['username'];
if(!isset($_SESSION['usuario'])){
    header("location: ../index.php");
    die();
}
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
                <a class="navbar-brand" href=""><img src="../images/HeroStore.png" alt="" width="70"></a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarText" aria-controls="navbarText" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarText">
                    <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                        </li>
                        <li class="nav-item">
                            <a class="nav-link active" aria-current="page" >Usuario: <?=$userName?></a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" aria-current="page" href="myProducts.php">Ver mis articulos</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="historyTransactions.php">Ver historial de transacciones</a>
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
            <img src="../images/bancoB.jpg" class="card-img-top" alt="..." >
            <div class="card-body">
                <h5 class="card-title">BANCO</h5>
                <p class="card-text">Revisa tus transacciones y has tus depositos a la tienda!</p>
                <a href="banco.php" class="btn btn-danger ">Ir al Banco</a>
            </div>
        </div>
        </div>
        <div class="col-md-6 align-content-center">
            <div class="card text-center" >
                <img src="../images/HeroStore2%20-%20copia.png"  class="card-img-top" alt="..." >
                <div class="card-body">
                    <h5 class="card-title">TIENDA</h5>
                    <p class="card-text">Ve nuestros articulos y realiza tus compras, tenemos lo mejor en tecnologia!</p>
                    <a href="tienda.php" class="btn btn-danger">Ir a la Tienda</a>
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
