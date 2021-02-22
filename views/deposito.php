<?php
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
</head>
<body>
<style>
    .usuario {
        position: absolute;
        top: -35px;
        left: 0px;
        background-color: #1981C9;
        width: 1306px;
        padding: 30px;
        font-family: sans-serif;
        font-size: 40px;
        color: white;
    }

    .depositar {
        padding: 10px;
        font-size: 30px;
        font-family: sans-serif;
        position: absolute;
        top: 400px;
        left: 430px;
    }

    .submit {
        position: absolute;
        top: 400px;
        left: 820px;
        font-family: sans-serif;
        font-size: 30px;
        padding: 10px;
    }

    .dollar {
        width: 60px;
        height: auto;
        position: absolute;
        bottom: 165px;
        left: 360px;
    }

    .cuanto {
        font-size: 50px;
        font-family: sans-serif;
        position: absolute;
        top: 220px;
        left: 280px;
    }

    .azulLogo {
        width: 220px;
        height: auto;
        position: absolute;
        top: 255px;
        left: 900px;
    }
</style>
<h2 class="cuanto">Cuanto desea depositar a </h2>
<h1 class="usuario"><?= $_SESSION['usuario'] ?></h1>
<form action="../controllers/depositoLogica.php" method="post">
    <input class="depositar" type="number" min="0" name="dinero" required>
    <input class="submit" type="submit" value="Depositar">
</form>
<img class="dollar" src="../images/dollar.png" alt="">
<img class="azulLogo" src="../images/Logo_Azul.jpg" alt="">
</body>
</html>
