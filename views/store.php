<?php
require "../models/Product.php";
$product = new Product();
$products = $product->getAllProduct();
session_start();
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
                    <a class="nav-link active">Usuario: <?=$_SESSION['user']?></a>
                </li>

                <li class="nav-item">
                    <a class="nav-link" aria-current="page" href="home.php">Atras</a>
                </li>

                <li class="nav-item">
                    <a class="nav-link" aria-current="page" href="myProducts.php">Ver mis articulos <svg xmlns="http://www.w3.org/2000/svg" width="20" fill="currentColor" class="bi bi-archive-fill" viewBox="0 0 16 16">
                            <path d="M12.643 15C13.979 15 15 13.845 15 12.5V5H1v7.5C1 13.845 2.021 15 3.357 15h9.286zM5.5 7h5a.5.5 0 0 1 0 1h-5a.5.5 0 0 1 0-1zM.8 1a.8.8 0 0 0-.8.8V3a.8.8 0 0 0 .8.8h14.4A.8.8 0 0 0 16 3V1.8a.8.8 0 0 0-.8-.8H.8z"/>
                        </svg></a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="ShoppingCar.php">Ver mi carrito de compras <svg xmlns="http://www.w3.org/2000/svg" width="20" fill="currentColor" class="bi bi-cart-fill" viewBox="0 0 16 16">
                            <path d="M0 1.5A.5.5 0 0 1 .5 1H2a.5.5 0 0 1 .485.379L2.89 3H14.5a.5.5 0 0 1 .491.592l-1.5 8A.5.5 0 0 1 13 12H4a.5.5 0 0 1-.491-.408L2.01 3.607 1.61 2H.5a.5.5 0 0 1-.5-.5zM5 12a2 2 0 1 0 0 4 2 2 0 0 0 0-4zm7 0a2 2 0 1 0 0 4 2 2 0 0 0 0-4zm-7 1a1 1 0 1 1 0 2 1 1 0 0 1 0-2zm7 0a1 1 0 1 1 0 2 1 1 0 0 1 0-2z"/>
                        </svg></a>
                </li>

                <li class="nav-item ">
                    <a class="nav-link" href="../controllers/close_session.php">Cerrar sesion</a>
                </li>

            </ul>
            <span class="navbar-text">
      </span>
        </div>
    </div>
</nav>

    <table class="table table-striped table-hove">
        <tr>
            <th>ARTICULO</th>
            <th>CLASE</th>
            <th>PRECIO</th>
            <th>DESCRIPCION</th>
        </tr>
        <?php
        foreach ($products as $produ) :
        ?>

        <tr>
            <th style="font-weight: normal"><?=$produ["product"]?></th>
            <th style="font-weight: normal"><?=$produ['class']?></th>
            <th style="font-weight: normal"><?=number_format($produ['price'], 2, ',', '.'). "$" ?></th>
            <th style="font-weight: normal"><a href="showDetails.php?product_id=<?=$produ['id']?>">ver mas</a></th>
            <?php endforeach; ?>
        </tr>
    </table>
    <!--PRODUCTOS-->
    <script src="../public/js/bootstrap.esm.js"></script>
    <script src="../public/js/bootstrap.min.js"></script>
</body>
</html>