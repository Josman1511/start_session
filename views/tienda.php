<?php
require "../models/Product.php";
$connection = new Product();
$products = $connection->getAllProduct();
?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
<style>
    tr{
        font-family: sans-serif;
        border-spacing: 0px;
        width: 600px;
    }
    th, td {
        width: 700px;
        text-align: left;
        vertical-align: top;
        padding: 10px;
    }
</style>
    <table>
        <tr style="font-size: 30px; color: white; background-color: #1981C9">
            <th >Articulo</th>
            <th>Clase</th>
            <th>Precio</th>
            <th>Informacion</th>
        </tr>
        <?php
        foreach ($products as $product) :
        ?>

        <tr style="font-size: 20px; background-color: whitesmoke">
            <th><?=$product["articulo"]?></th>
            <th><?=$product['clase']?></th>
            <th><?=number_format($product['precio'], 2, ',', '.'). "$" ?></th>
            <th><a href="showDetails.php?product_id=<?=$product['id']?>">ver mas</a></th>
            <?php endforeach; ?>
        </tr>
    </table>
<a style="font-size: 20px; font-family: sans-serif; position: absolute; bottom: 10px; right: 30px" href="home.php">atras</a>
</body>
</html>