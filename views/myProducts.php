<?php
session_start();
require "../models/Product.php";
require "../models/Transactions.php";
$connection = new Connection();
$user =$connection->getUser($_SESSION['usuario']);
$userId = $user['id'];
$product = new Product();
$products = $product->getAllProduct();
$transaction = new Transactions();
$purchase = $transaction->getCurrentUserCompras($_SESSION['id']);
?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta -a name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link rel="stylesheet" href="../public/css/bootstrap.min.css" crossorigin="anonymous">
</head>
<body>
<table class="table table-striped table-hove">
    <tr >
        <th >Articulo</th>
        <th >Detalles</th>

    </tr>
    <?php
    foreach ($purchase as $userPurchase) :
    ?>
    <tr >
        <th style="font-weight: normal"> <button type="button" class="btn btn-secondary" data-bs-toggle="tooltip" data-bs-placement="right" title= "<img src='../images/products/<?=$userPurchase['image']?>'/>">
                <?=$userPurchase['articulo']?>
            </button>
        </th>
        <th style="font-weight: normal"><a href="showDetails.php?product_id=<?=$userPurchase['product_id']?>">Ver Detalles</a></th>
        <?php endforeach; ?>
    </tr>
</table>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/js/bootstrap.bundle.min.js" integrity="sha384-b5kHyXgcpbZJO/tY9Ul7kGkf1S0CWuKcCD38l8YkeH8z8QjE0GmW1gYU5S9FOnJ0" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.6.0/dist/umd/popper.min.js" integrity="sha384-KsvD1yqQ1/1+IA7gi3P0tyJcT3vR+NdBTt13hSJ2lnve8agRGXTTyNaBYmCR/Nwi" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/js/bootstrap.min.js" integrity="sha384-nsg8ua9HAw1y0W1btsyWgBklPnCUAFLuTMS2G72MMONqmOymq585AcH49TLBQObG" crossorigin="anonymous"></script>
</body>
</html>