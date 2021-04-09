<?php
require "../models/Transactions.php";
session_start();
$connection = new Connection();
$user = $connection->getUser($_SESSION['usuario']);
$userId = $user['id'];
$userName = $user['username'];
$transaction = new Transactions();
if (isset($_GET['compras'])) {
    $transactions = $transaction->getCurrentUserCompras($userId);
} elseif (isset($_GET['depositos'])) {
    $transactions = $transaction->getCurrentUserDeposit($userId);
} else {
    $transactions = $transaction->getCurrentUserTransactions($userId);
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
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/css/bootstrap.min.css" rel="stylesheet"
          integrity="sha384-BmbxuPwQa2lc/FVzBcNJ7UAyJxM6wuqIj61tLrc4wSX0szH/Ev+nYRRuWlolflfl" crossorigin="anonymous">
    <link rel="stylesheet" href="../public/css/bootstrap.min.css" crossorigin="anonymous">
</head>
<body>

<nav class="navbar navbar-expand-lg navbar-dark bg-danger">
    <div class="container-fluid">
        <a class="navbar-brand" href="#"><img src="../images/HeroStore.png" alt="" width="70"></a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarText"
                aria-controls="navbarText" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarText">
            <ul class="navbar-nav me-auto mb-2 mb-lg-0">

                <li class="nav-item">
                    <a class="nav-link active">Usuario: <?= $userName ?></a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" aria-current="page" href="home.php">Atras</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="../controllers/close_session.php">Cerrar sesion</a>
                </li>
                <li class="nav-item ">
                    <form method="get">

                        <button style="font-size: 13px" name="depositos" type="submit" class="btn btn-danger">Mostrar
                            solo depositos
                        </button>
                        <button style="font-size: 13px" name="compras" type="submit" class="btn btn-danger">Mostrar solo
                            compras
                        </button>
                        <button style="font-size: 13px" name="todo" type="submit" class="btn btn-danger">Mostrar todo
                        </button>
                    </form>
                </li>

            </ul>
            <span class="navbar-text">
      </span>
        </div>
    </div>
</nav>
<?php if (empty($transactions)) : ?>
    <h1 class="thereAreNotTransactions">No hay transacciones aun</h1>
<?php else : ?>
            <table class="table table-striped">
                <tr>
                    <th>CLASE</th>
                    <th>MONTO</th>
                    <th>COMENTARIO</th>
                    <th>SALDO ACTUAL</th>
                    <?php foreach ($transactions

                    as $transac) : ?>
                </tr>
                <tr>
                    <th style="font-weight: normal"><?= $transac["clase"] ?></th>
                    <th style="font-weight: normal"><?= number_format($transac['monto'], 2, ',', '.') . "$" ?></th>
                    <th style="font-weight: normal"><?= $transac['comentario'] ?></th>
                    <th style="font-weight: normal"><?= number_format($transac['balance'], 2, ',', '.') . "$" ?></th>
                    <?php endforeach; ?>

                </tr>
            </table>
<?php endif; ?>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-b5kHyXgcpbZJO/tY9Ul7kGkf1S0CWuKcCD38l8YkeH8z8QjE0GmW1gYU5S9FOnJ0"
        crossorigin="anonymous"></script>
<script src="../public/js/bootstrap.esm.js"></script>
<script src="../public/js/bootstrap.min.js"></script>

</body>
</html>
