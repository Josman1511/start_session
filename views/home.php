<?php
session_start();
if(isset($_SESSION['usuario'])){
    $mensaje = "¿Que quieres usuario?";
}else{
header("location: index.php");
die();
}
$hoy = date("F j, Y");            
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-giJF6kkoqNQ00vy+HMDP7azOuL0xtbfIcaT9wjKHr8RbDVddVHyTfAAsrekwKmP1" crossorigin="anonymous">
    <style>
        .barra{
            background-color: #1981C9;
            font-size: 250%;
            color: white;
            text-align: left;
        }
        .input{
            transition: width 0.4s ease-in-out;
        }
        .azulSmall{
            position: absolute;
            top: 11px;
            right: 10px;
            width: 100px;
            height: auto;
        }
        .cuadro1{
            width: 400px;
            height: auto ;
        }
        .saldo{
            color: white;
            font-size: 30px;
            position: absolute;
            left: 160px;
            top:460px;
        }
        .tienda{
            color: white;
            font-size: 30px;
            position: absolute;
            left: 790px;
            top:460px;
        }
    </style>
</head>
<body>
    <p class="barra"><?= $hoy. "/ Usuario: ".$_SESSION['usuario']?></p>
    <form action="../controllers/close_session.php" method="post">
    <input style="position: absolute; top:70px; right: 0px;" type="submit" value="Cerrar Sesion">
    </form>
    <img class="azulSmall" src="../images/Logo_Azul%20-%20copia.jpg">
    <img style="position: absolute; top:130px; left: 140px;" class="cuadro1" src="../images/cuadrado2.jpg" alt="">
    <img style="position: absolute; top:120px; left: 150px;" class="cuadro1" src="../images/cuadrado.jpg" alt="">
    <a title="banco" href="banco.php"><img style="width:400px; height:auto; position: absolute; top:120px; left: 150px;" src="../images/saldo.jpg" alt="banco">
    <img style="position: absolute; top:130px; left: 760px;" class="cuadro1" src="../images/cuadrado2.jpg" alt="">
    <img style="position: absolute; top:120px; left: 750px;" class="cuadro1" src="../images/cuadrado.jpg" alt="">
    <a title="tienda" href="tienda.php"><img style="width:440px; height:auto; position: absolute; top:70px; left: 725px;" src="../images/tienda.png" alt="tienda">
    <a class="saldo" href="banco.php">Consultar saldo en la tienda</a>
    <a class="tienda" href="tienda.php"> Ver articulos de la tienda</a>

</body>
</html>