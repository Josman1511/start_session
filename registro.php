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
    .fondo {
        position: absolute;
        top: 50px;
        left: 430px;
        width: 500px;
        height: auto;
    }

    .fondo2 {
        position: absolute;
        top: 40px;
        left: 420px;
        width: 500px;
        height: auto;
    }

    .letrasRegister {
        font-family: sans-serif;
        color: white;
        position: absolute;
        top: 60px;
        left: 450px;
        font-size: 55px;
        text-shadow: black 2px 4px;

    }

    .input {
        width: 250px;
        padding: 12px 80px;
        box-sizing: content-box;
    }

    .submit {
        width: 250px;
        padding: 12px 80px;
        box-sizing: content-box;
    }

    .icon {
        width: 40px;
        height: auto;
        position: absolute;
        left: 450px;
    }

    .usuarioExiste {
        font-family: sans-serif;
        position: absolute;
        top: 235px;
        left: 870px;
        padding: 5px;
        border-width: 4px;
        width: 180px;
        border-left: 6px solid #ff0000;
        background-color: #f4caca;
    }
</style>
<img class="fondo2" src="images/cuadrado2.jpg" alt="">
<img class="fondo" src="images/cuadrado.jpg" alt="">
<h2 class="letrasRegister">Ingrese los datos</h2>
<?php if ($_SESSION["yaExisteThisUser"] !== null) : ?>
    <p class="usuarioExiste"><?= $_SESSION["yaExisteThisUser"] ?></p>
<?php endif; ?>
<?php if($_SESSION['passwordMax8'] !== null) : ?>
    <p class="usuarioExiste"> <?= $_SESSION['passwordMax8'] ?></p>
<?php endif;?>
<form action="addRegisterToBaseDatos.php" method="post">
    <input placeholder="Ingrese su nombre" class="input" style="position: absolute; top: 250px; left: 450px;"
           type="text" name="usernameRegister" required>
    <input placeholder="Ingrese su contraseña" class="input" style="position: absolute; top: 350px; left: 450px;"
           type="password" name="passwordRegister" required>
    <input class="submit" style="position: absolute; top: 450px; left: 450px;" type="submit" value="Registrarse">
</form>
<img style="top: 250px" class="icon" src="images/userRegister.png" alt="">
<img style="top: 355px; width: 30px; left: 455px;" class="icon" src="images/passwordRegister.png" alt="">
</body>
</html>