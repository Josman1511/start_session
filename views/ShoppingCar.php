<?php
require_once "../models/ShoppingCar.php";
require_once "../models/Connection.php";
$shoppingCar = new ShoppingCar();
$connection = new Connection();
$user = $connection->getUser($_SESSION['user']);
$userBalance = number_format($user['balance'],2,",", ".");
$products = $shoppingCar->getCurrentProducts($_SESSION['id']);
$totalSum = $shoppingCar->getTotalPrice($_SESSION['id']);
$totalPrice = "$ ". number_format($totalSum,2, ",", ".");
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
<nav class="navbar navbar-light bg-light">
    <div class="container-fluid">
        <a class="navbar-brand" href="#">
            <img src="../images/HeroStore2.png" alt="" width="60" class="d-inline-block align-text-top">

        </a>
    </div>
</nav>
<div class="container-fluid">

    <div class="row mt-md-4">
        <div class="col-md-8" style="overflow-y:scroll; height: 500px;">
            <table class="table" id="dsTable">
                <tr style="font-size: 25px">
                    <th>Producto</th>
                    <th>Precio</th>
                    <th>Cantidad</th>
                    <th>Total</th>

                </tr>
                <?php
                foreach ($products

                         as $inShoppingCar) :
                    ?>
                    <tr style="font-size: 20px;">
                        <th style=" font-weight: normal"> <?= $inShoppingCar['product'] ?></th>
                        <th style=" font-weight: normal" class="text-danger" >
                            $ <?= number_format($inShoppingCar['price'], 2, ",", ".") ?></th>
                        <th>
                            <div class="btn-group" role="group" aria-label="Basic outlined example">
                                <button type="button" class="btn btn-outline-dark"
                                        onclick="subAmountProduct(<?= $inShoppingCar['id'] ?>)">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
                                         class="bi bi-dash-circle" viewBox="0 0 16 16"> 
                                        <path d="M8 15A7 7 0 1 1 8 1a7 7 0 0 1 0 14zm0 1A8 8 0 1 0 8 0a8 8 0 0 0 0 16z"/>
                                        <path d="M4 8a.5.5 0 0 1 .5-.5h7a.5.5 0 0 1 0 1h-7A.5.5 0 0 1 4 8z"/>
                                    </svg>
                                </button>
                                <button type="button" id="amountProduct<?=$inShoppingCar['id']?>" class="btn btn-outline-dark"
                                        disabled><?= $inShoppingCar['amount'] ?></button>
                                <button type="button" class="btn btn-outline-dark"
                                        onclick="plusAmountProduct(<?= $inShoppingCar['id'] ?>)">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
                                         class="bi bi-plus-circle" viewBox="0 0 16 16">
                                        <path d="M8 15A7 7 0 1 1 8 1a7 7 0 0 1 0 14zm0 1A8 8 0 1 0 8 0a8 8 0 0 0 0 16z"/>
                                        <path d="M8 4a.5.5 0 0 1 .5.5v3h3a.5.5 0 0 1 0 1h-3v3a.5.5 0 0 1-1 0v-3h-3a.5.5 0 0 1 0-1h3v-3A.5.5 0 0 1 8 4z"/>
                                    </svg>
                                </button>
                            </div>
                        </th>
                        <th id="totalPrice<?=$inShoppingCar['id']?>">$ <?= number_format($inShoppingCar['total_price'], 2, ",", ".") ?></th>
                        <th>
                            <button type="submit" class="btn"
                                    onclick="deleteRow(this, <?= $inShoppingCar['id'] ?>)">
                                <svg xmlns="http://www.w3.org/2000/svg" width="20" fill="currentColor"
                                     class="bi bi-x-circle" viewBox="0 0 16 16">
                                    <path d="M8 15A7 7 0 1 1 8 1a7 7 0 0 1 0 14zm0 1A8 8 0 1 0 8 0a8 8 0 0 0 0 16z"/>
                                    <path d="M4.646 4.646a.5.5 0 0 1 .708 0L8 7.293l2.646-2.647a.5.5 0 0 1 .708.708L8.707 8l2.647 2.646a.5.5 0 0 1-.708.708L8 8.707l-2.646 2.647a.5.5 0 0 1-.708-.708L7.293 8 4.646 5.354a.5.5 0 0 1 0-.708z"/>
                                </svg>
                            </button>
                        </th>


                    </tr>
                <?php endforeach; ?>
            </table>
        </div>
        <div class="col-md-4">
            <p>Su saldo actual es: $ <?=$userBalance?> </p>
            <p style="color: #bdbdbd; font-size: 14px ">Si gustas puedes seguir añadiendo articulos a tu carrito,
                tenemos los mejores articulos al mejor precio.</p>
            <h1 class="text-center" style="background-color: #f9f9f9; font-weight: bold" id="total">Total: <span style="font-weight: normal; color: #c62d2d"><?=$totalPrice?></span></h1>
            <div class="d-grid gap-2 m-md-5">
                <a href="../controllers/purchaseShoppingCar.php" type="button" style="font-size: 25px" class="btn btn-danger">Realizar compra
                    <svg xmlns="http://www.w3.org/2000/svg" width="26" fill="currentColor" class="bi bi-cash-stack"
                         viewBox="0 0 16 16">
                        <path d="M1 3a1 1 0 0 1 1-1h12a1 1 0 0 1 1 1H1zm7 8a2 2 0 1 0 0-4 2 2 0 0 0 0 4z"/>
                        <path d="M0 5a1 1 0 0 1 1-1h14a1 1 0 0 1 1 1v8a1 1 0 0 1-1 1H1a1 1 0 0 1-1-1V5zm3 0a2 2 0 0 1-2 2v4a2 2 0 0 1 2 2h10a2 2 0 0 1 2-2V7a2 2 0 0 1-2-2H3z"/>
                    </svg>
                </a>
                <a type="button" href="store.php" style="font-size: 20px" class="mt-md-3 btn btn-outline-secondary">Seguir
                    comprando
                    <svg xmlns="http://www.w3.org/2000/svg" width="24" fill="currentColor" class="bi bi-bag-plus"
                         viewBox="0 0 16 16">
                        <path fill-rule="evenodd"
                              d="M8 7.5a.5.5 0 0 1 .5.5v1.5H10a.5.5 0 0 1 0 1H8.5V12a.5.5 0 0 1-1 0v-1.5H6a.5.5 0 0 1 0-1h1.5V8a.5.5 0 0 1 .5-.5z"/>
                        <path d="M8 1a2.5 2.5 0 0 1 2.5 2.5V4h-5v-.5A2.5 2.5 0 0 1 8 1zm3.5 3v-.5a3.5 3.5 0 1 0-7 0V4H1v10a2 2 0 0 0 2 2h10a2 2 0 0 0 2-2V4h-3.5zM2 5h12v9a1 1 0 0 1-1 1H3a1 1 0 0 1-1-1V5z"/>
                    </svg>
                </a>
                <a type="button" href="../controllers/deleteAllFromShoppingCar.php" style="font-size: 20px"
                   class=" mt-md-3 btn btn-outline-dark">Vaciar Carrito
                    <svg xmlns="http://www.w3.org/2000/svg" width="22" fill="currentColor" class="bi bi-cart-x"
                         viewBox="0 0 16 16">
                        <path d="M7.354 5.646a.5.5 0 1 0-.708.708L7.793 7.5 6.646 8.646a.5.5 0 1 0 .708.708L8.5 8.207l1.146 1.147a.5.5 0 0 0 .708-.708L9.207 7.5l1.147-1.146a.5.5 0 0 0-.708-.708L8.5 6.793 7.354 5.646z"/>
                        <path d="M.5 1a.5.5 0 0 0 0 1h1.11l.401 1.607 1.498 7.985A.5.5 0 0 0 4 12h1a2 2 0 1 0 0 4 2 2 0 0 0 0-4h7a2 2 0 1 0 0 4 2 2 0 0 0 0-4h1a.5.5 0 0 0 .491-.408l1.5-8A.5.5 0 0 0 14.5 3H2.89l-.405-1.621A.5.5 0 0 0 2 1H.5zm3.915 10L3.102 4h10.796l-1.313 7h-8.17zM6 14a1 1 0 1 1-2 0 1 1 0 0 1 2 0zm7 0a1 1 0 1 1-2 0 1 1 0 0 1 2 0z"/>
                    </svg>
                </a>
            </div>
        </div>
    </div>
</div>
<!--JS-->
<script src="https://code.jquery.com/jquery-3.4.1.min.js"
        integrity="sha256-CSXorXvZcTkaix6Yvo6HppcZGetbYMGWSFlBw8HfCJo=" crossorigin="anonymous"></script>
<script type="text/javascript"></script>

<script src="../public/js/bootstrap.esm.js"></script>
<script src="../public/js/bootstrap.min.js"></script>
<script type="text/javascript">
    function deleteRow(row, productId) {
        $.ajax(
            {
                url: '../controllers/eliminateProductFromShoppingCar.php?product_id=' + productId,
                success: function (data) {
                    if ('success' == data) {
                        var d = row.parentNode.parentNode.rowIndex;
                        document.getElementById("dsTable").deleteRow(d);
                        sumTotal();
                    } else if (data == 'error') {
                        alert('Error');
                    }
                }
            }
        );

    }

    function plusAmountProduct(productId) {
        $.ajax(
            {
                url: '../controllers/changeAmountProductToShoppingCar.php?product_id=' + productId + '&subOrSum=2',
                success: function (data) {
                    $("#amountProduct" + productId).html(data);
                    changeProductPrecioTotal(productId);
                    sumTotal();
                }
            }
        );
    }
    function subAmountProduct(productId) {
        $.ajax(
            {
                url: '../controllers/changeAmountProductToShoppingCar.php?product_id=' + productId + '&subOrSum=1',
                success: function (data) {
                    $("#amountProduct" + productId).html(data);
                    changeProductPrecioTotal(productId);
                    sumTotal();
                }
            }
        );
    }
    function changeProductPrecioTotal(productId){
        $.ajax(
            {
                url: '../controllers/changeTotalPriceProductFromShoppingCar.php?product_id=' + productId,
                success: function (data){
                    $("#totalPrice" + productId).html("$ " + data);
                }
            }
        );
    }
    function sumTotal(){
        $.ajax(
            {
                url: '../controllers/sumTotalPriceProducts.php',
                success: function (data){
                    $("#total").html("Total" + data )
                }
            }
        );
    }
</script>

</body>
</html>