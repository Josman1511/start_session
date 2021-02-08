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
    </style>
</head>
<body>
    <p class="barra"><?= $hoy. "/ Usuario: ".$_SESSION['usuario']?></p>
    <h1><?= $mensaje ?></h1>
    <form action="Saludo.php" method="post">
    <input class="input" type="number", name="edad" placeholder="Ingresa tu edad" min='0' required>
        <input type="submit" value="Ir a saludo"></br></br>
    </form>
    <form action="Cerrar Sesion.php" method="post">
    <input type="submit" value="Cerrar Sesion">
    </form>
    <img class="azulSmall" src="Logo_Azul%20-%20copia.jpg">
</body>
</html>