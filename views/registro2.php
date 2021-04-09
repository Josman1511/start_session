<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<link rel="stylesheet" href="../public/css/bootstrap.min.css" crossorigin="anonymous">
<body>
<nav class="navbar navbar-expand-lg navbar-light bg-light">
    <div class="container-fluid">
        <a class="navbar-brand" href="#">Hero Store</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav">
                <li class="nav-item">
                    <a class="nav-link" aria-current="page" href="../index.php">Inicio</a>
            </ul>
        </div>
    </div>
</nav>
<div class="container fluid">
<div class="row">
    <div class="col-md-4">
    </div>
    <div class="col-md-4 align-items-end mt-md-5">
        <form action="../controllers/addRegisterToBaseDatos.php" method="post" autocomplete="off">
            <div style="font-size: 70px" class="text-center">Registro</div>
            <div class="mb-4">
                <label for="exampleInputEmail1" class="form-label">Nombre</label>
                <input type="text" name="usernameRegister" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
            </div>
            <div class="mb-3">
                <label for="exampleInputPassword1" class="form-label">Contraseña</label>
                <input type="password" name="passwordRegister" class="form-control" id="exampleInputPassword1">
            </div>
            <div class="text-center">
            <button type="submit" class="btn btn-danger">Enviar</button>
            </div>
        </form>
    </div>
    <div class="col-md-4"></div>
</div>
</div>
<script src="../public/js/bootstrap.esm.js"></script>
<script src="../public/js/bootstrap.min.js"></script>
</body>
</html>