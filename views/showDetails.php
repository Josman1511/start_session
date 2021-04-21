<?php
require "../models/Product.php";
$connecProduct = new Product();
$product = $connecProduct->currentProduct($_GET['product_id']);
$productName = $product['articulo'];
$productClass = $product['clase'];
$productImage = $product['image'];
$productAmount = $product ['cantidad'];
$productPrice = number_format($product['precio'], 2, ',', '.');
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
<nav class="navbar navbar-expand-lg navbar-dark bg-danger">
    <div class="container-fluid">
        <img src="../images/HeroStore.png" width="70" alt="">
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarText" aria-controls="navbarText" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarText">
            <ul class="navbar-nav me-auto mb-2 mb-lg-0">
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
<div class="row">
    <div class="col-md-6 m-md-2">
        <h1 style="font-weight: normal"><?=$productName?></h1>
        <p style="font-weight: normal; color: #bdbdbd">Familia: <?=$productClass?> </p>
        <div class="text-center"><img src="../images/products/<?=$productImage?>" width="500" alt="..."></div>
    </div>
    <div class="col-md-5 card mt-md-3">
        <h1 style="font-size: 50px;font-weight: normal" class="text-danger m-md-2">$ <?= $productPrice?> </h1>
        <h5 style="color: #bdbdbd">Unidad a $ <?=$productPrice?> <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-tags" viewBox="0 0 16 16">
                <path d="M3 2v4.586l7 7L14.586 9l-7-7H3zM2 2a1 1 0 0 1 1-1h4.586a1 1 0 0 1 .707.293l7 7a1 1 0 0 1 0 1.414l-4.586 4.586a1 1 0 0 1-1.414 0l-7-7A1 1 0 0 1 2 6.586V2z"/>
                <path d="M5.5 5a.5.5 0 1 1 0-1 .5.5 0 0 1 0 1zm0 1a1.5 1.5 0 1 0 0-3 1.5 1.5 0 0 0 0 3zM1 7.086a1 1 0 0 0 .293.707L8.75 15.25l-.043.043a1 1 0 0 1-1.414 0l-7-7A1 1 0 0 1 0 7.586V3a1 1 0 0 1 1-1v5.086z"/>
            </svg></h5>
        <?php if($productAmount > 0) :?>
        <a href="../controllers/purchase.php?product_id=<?=$product['id']?>" style="font-size: 40px; border-radius: 20px" type="buttom" class="btn btn-danger mt-md-5">Comprar ahora</a>
            <a href="../controllers/addToShoppingCar.php?product_id=<?=$product['id']?>" style="font-size: 30px; border-radius: 30px" type="buttom" class=" mt-md-4 btn btn-outline-danger">Añadir al carrito <svg xmlns="http://www.w3.org/2000/svg" width="26" fill="currentColor" class="bi bi-cart" viewBox="0 0 16 16">
                    <path d="M0 1.5A.5.5 0 0 1 .5 1H2a.5.5 0 0 1 .485.379L2.89 3H14.5a.5.5 0 0 1 .491.592l-1.5 8A.5.5 0 0 1 13 12H4a.5.5 0 0 1-.491-.408L2.01 3.607 1.61 2H.5a.5.5 0 0 1-.5-.5zM3.102 4l1.313 7h8.17l1.313-7H3.102zM5 12a2 2 0 1 0 0 4 2 2 0 0 0 0-4zm7 0a2 2 0 1 0 0 4 2 2 0 0 0 0-4zm-7 1a1 1 0 1 1 0 2 1 1 0 0 1 0-2zm7 0a1 1 0 1 1 0 2 1 1 0 0 1 0-2z"/>
                </svg> </a>
        <?php else : ?>
            <button type="button" style="font-size: 35px; border-radius: 20px" class="btn btn-secondary btn-lg mt-md-5" disabled>Producto Agotado</button>
        <?php endif;?>
        <p class="mt-md-5" style="color: green"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-patch-check" viewBox="0 0 16 16">
                <path fill-rule="evenodd" d="M10.354 6.146a.5.5 0 0 1 0 .708l-3 3a.5.5 0 0 1-.708 0l-1.5-1.5a.5.5 0 1 1 .708-.708L7 8.793l2.646-2.647a.5.5 0 0 1 .708 0z"/>
                <path d="m10.273 2.513-.921-.944.715-.698.622.637.89-.011a2.89 2.89 0 0 1 2.924 2.924l-.01.89.636.622a2.89 2.89 0 0 1 0 4.134l-.637.622.011.89a2.89 2.89 0 0 1-2.924 2.924l-.89-.01-.622.636a2.89 2.89 0 0 1-4.134 0l-.622-.637-.89.011a2.89 2.89 0 0 1-2.924-2.924l.01-.89-.636-.622a2.89 2.89 0 0 1 0-4.134l.637-.622-.011-.89a2.89 2.89 0 0 1 2.924-2.924l.89.01.622-.636a2.89 2.89 0 0 1 4.134 0l-.715.698a1.89 1.89 0 0 0-2.704 0l-.92.944-1.32-.016a1.89 1.89 0 0 0-1.911 1.912l.016 1.318-.944.921a1.89 1.89 0 0 0 0 2.704l.944.92-.016 1.32a1.89 1.89 0 0 0 1.912 1.911l1.318-.016.921.944a1.89 1.89 0 0 0 2.704 0l.92-.944 1.32.016a1.89 1.89 0 0 0 1.911-1.912l-.016-1.318.944-.921a1.89 1.89 0 0 0 0-2.704l-.944-.92.016-1.32a1.89 1.89 0 0 0-1.912-1.911l-1.318.016z"/>
            </svg> Verificado y vendido por Hero Store</p>
    </div>
    <div class="col-md-1"></div>

</div>
</div>
<div class="row sticky-md-top mb-md-4">

    <div class="col-md-2 text-center"></div>

    <div class="col-md-8"></div>

    <div class="col-md-2">


    </div>
</div>
<body>

<!--JS-->

<script src="../public/js/bootstrap.esm.js"></script>
<script src="../public/js/bootstrap.min.js"></script>
</body>
</html>
