<?php
session_start();
if (isset($_SESSION['usuario'])) {
    header("location: views/home.php");
}
?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link rel="stylesheet" href="public/css/bootstrap.min.css" crossorigin="anonymous">
</head>
<body>
<nav class="navbar navbar-expand-lg navbar-dark bg-danger">
    <div class="container-fluid">
        <a class="navbar-brand" href="#">Hero Store</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarText"
                aria-controls="navbarText" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarText">
            <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                <li class="nav-item">
                    <a class="nav-link active" aria-current="page" href="#"></a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#"></a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="controllers/addRegisterToBaseDatos.php">Registrarse</a>
                </li>
            </ul>
        </div>
    </div>
</nav>
<div class="container">
    <div class="row  align-items-end mt-md-5 mt-sm-1">
        <div class="col-md-3">
            <form action="controllers/start_session.php" method="post" autocomplete="off">
                <div style="font-size:45px">Iniciar Sesion</div>
                <div class="mb-3">
                    <label for="exampleInputEmail1" class="form-label">Ingrese su nombre</label>
                    <input type="text" class="form-control" id="exampleInputEmail1" name="name" aria-describedby="emailHelp">
                </div>
                <div class="mb-3">
                    <label for="exampleInputPassword1" class="form-label">Ingrese su contraseña</label>
                    <input type="password" name="password" class="form-control" id="exampleInputPassword1">
                </div>
                <button type="submit" class="btn btn-danger">Iniciar</button>
                <div class="mt-md-3 align-content-end ">
                    <?= $_SESSION ['msj'] ?? '' ?>
                </div>
            </form>
        </div>
        <div class="col-md-9 text-center"><img src="images/HeroStore2.png" alt="" width="500"></div>
    </div>
<script src="public/js/bootstrap.esm.js"></script>
<script src="public/js/bootstrap.min.js"></script>
</body>
</html>
