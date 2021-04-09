<?php
require "../models/Saldo.php";
require "../models/Transactions.php";
if(isset($_POST['dinero']) && is_numeric($_POST['dinero'])){
//obteniendo el id del usuario
    $connection = new Connection();
    $currentUser = $connection->getUser($_SESSION['usuario']);
    $currentUserId = $currentUser['id'];
//añadiendo la transaccion a la base de datos
    $clase = 'DEPOSITO';
    $balance = $currentUser['saldo'] + $_POST['dinero'];
    $depositando = $_POST['dinero'];
    $comentario = $_POST['comentario'];
    $productId = null;
    $transactions = new Transactions();
    $transactions->addNewDeposit($depositando, $comentario, $balance, $currentUserId, $productId);
//sumando el deposito a la cuenta
    $deposito = new Saldo();
    $deposito->deposito($_POST['dinero']);
    header("location: ../views/banco.php");
}else{
    header("location: ../views/banco.php");
}
?>
