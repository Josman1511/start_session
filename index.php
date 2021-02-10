<?php
session_start();
if (isset($_SESSION['usuario'])) {
    header("location: HTML2.php");
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- CSS only -->
    <!--<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-giJF6kkoqNQ00vy+HMDP7azOuL0xtbfIcaT9wjKHr8RbDVddVHyTfAAsrekwKmP1" crossorigin="anonymous">-->
    <title>Document</title>
    <style>
        .input {
            width: 250px;
            padding: 12px 80px;
            box-sizing: content-box;

        }

        .titulo {
            background-color: #1981C9;
            color: white;
            font-family: sans-serif;
            font-size: 500%;
            font-weight: bolder;
            font-variant: small-caps;
            text-align: left;
            text-decoration: blink;
            text-shadow: 5px 2px 4px black;
            letter-spacing: -4px;
            word-spacing: 10px;
            margin-top: -8px;
            margin-left: -8px;
            margin-right: -10px;

        }

        .mensaje_error {
            font-family: sans-serif;
            color: #1981C9;
            padding: 5px;
        <?= isset($_SESSION ['msj']) ?
        "border-width: 4px ;
        width: 300px;
        border-left: 6px solid #1981C9;
        background-color: lightgrey;" : ""?>
        }

        .diseño_letras_input {
            font-family: sans-serif;

        }

        .lista {
            list-style-type: none;

        }

        div {
            border-top: 6px solid lightblue;
            position: absolute;
            top: 440px;
            left: 5px;
            color: white;
            width: 300px;
            height: 20px;
            background: #1981C9;
            transition: height 2s;
            overflow: hidden;
        }
        div:hover {
            width: 300px;
            height: 100px;
        }

        .imagen {
            position: absolute;
            top: 160px;
            left: 550px;
        }

        .imgAlcaldia {
            width: 500px;
            height: auto;
            position: absolute;
            top: 450px;
            right: 200px;
        }

        .ingrDatos {
            font-family: sans-serif;
            font-size: 320%;
            position: absolute;
            top: 100px;
            left: 70px;
            color: #1981C9;
            text-shadow: 2px 1px 2px black;
        }

        .datos {
            color: #081f3f;
        }
        .azulSmall{
            position: absolute;
            top: 10px;
            right: 10px;
            width: 200px;
            height: auto;
        }
    </style>
</head>
<body>
<h1 class="titulo"> Inicio de sesion </h1>
<h2 class="ingrDatos">Ingrese sus <span class="datos"> datos </span></h2>
<form action="FacebookPirata.php" method="post">
    <input style="position: absolute; top: 220px; left: 70px; " class="diseño_letras_input, input" type="text" required
           name="name" placeholder="Ingresa tu nombre"></br></br>
    <input style="position: absolute; top: 285px; left: 70px; " class="diseño_letras_input, input" type="password"
           required name="password" placeholder="Ingresa tu contraseña"></br></br>
    <input style="position: absolute; top: 345px; left: 70px;" class="diseño_letras_input" type="submit"
           value="Iniciar Sesion">
    <p class="mensaje_error"><?= $_SESSION ['msj'] ?? '' ?> </p>
</form>
<div><h3> El buen juicio proviene de la experiencia y la experiencia proviene del mal juicio”. </h3>
</div>
<img class="imagen" src="Logo_Azul.jpg">
<img class="imgAlcaldia" src="../images/logo.png" alt="Alcaldia de Bogota">
<img class="azulSmall" src="Logo_Azul%20-%20copia.jpg">
<!-- JavaScript Bundle with Popper -->
<!--<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-ygbV9kiqUc6oa4msXn9868pTtWMgiQaeYH7/t7LECLbyPA2x65Kgf80OJFdroafW" crossorigin="anonymous"></script>-->
</body>
</html>