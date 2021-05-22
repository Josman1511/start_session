<?php
session_start();
require "../models/Connection.php";
$connection = new Connection();
$user = $connection->getUser($_SESSION['user']);
$userName = $user['username'];
if(!isset($_SESSION['user'])){
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

<div class="container-fluid">
<div class="row mt-sm-4 m-md-3">
    <div class="col-md-6">
        <div class="card text-center">
            <img src="../images/bancoB.jpg" class="card-img-top" alt="..." >
            <div class="card-body">
                <h5 class="card-title">BANCO</h5>
                <p class="card-text">Revisa tus transacciones y has tus depositos a la tienda!</p>
                <a href="bank.php" class="btn btn-danger ">Ir al Banco</a>
            </div>
        </div>
        </div>
        <div class="col-md-6 align-content-center">
            <div class="card text-center" >
                <img src="../images/HeroStore2%20-%20copia.png"  class="card-img-top" alt="..." >
                <div class="card-body">
                    <h5 class="card-title">TIENDA <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-shop" viewBox="0 0 16 16">
                            <path d="M2.97 1.35A1 1 0 0 1 3.73 1h8.54a1 1 0 0 1 .76.35l2.609 3.044A1.5 1.5 0 0 1 16 5.37v.255a2.375 2.375 0 0 1-4.25 1.458A2.371 2.371 0 0 1 9.875 8 2.37 2.37 0 0 1 8 7.083 2.37 2.37 0 0 1 6.125 8a2.37 2.37 0 0 1-1.875-.917A2.375 2.375 0 0 1 0 5.625V5.37a1.5 1.5 0 0 1 .361-.976l2.61-3.045zm1.78 4.275a1.375 1.375 0 0 0 2.75 0 .5.5 0 0 1 1 0 1.375 1.375 0 0 0 2.75 0 .5.5 0 0 1 1 0 1.375 1.375 0 1 0 2.75 0V5.37a.5.5 0 0 0-.12-.325L12.27 2H3.73L1.12 5.045A.5.5 0 0 0 1 5.37v.255a1.375 1.375 0 0 0 2.75 0 .5.5 0 0 1 1 0zM1.5 8.5A.5.5 0 0 1 2 9v6h1v-5a1 1 0 0 1 1-1h3a1 1 0 0 1 1 1v5h6V9a.5.5 0 0 1 1 0v6h.5a.5.5 0 0 1 0 1H.5a.5.5 0 0 1 0-1H1V9a.5.5 0 0 1 .5-.5zM4 15h3v-5H4v5zm5-5a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1v3a1 1 0 0 1-1 1h-2a1 1 0 0 1-1-1v-3zm3 0h-2v3h2v-3z"/>
                        </svg></h5>
                    <p class="card-text">Ve nuestros articulos y realiza tus compras, tenemos lo mejor en tecnologia!</p>
                    <a href="store.php" class="btn btn-danger">Ir a la Tienda </a>
                </div>
            </div>
        </div>
    </div>
</div>

<script src="../public/js/bootstrap.esm.js"></script>
<script src="../public/js/bootstrap.min.js"></script>
</body>
</html>
