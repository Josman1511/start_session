<?php
require "../models/Balance.php";
require "../models/Transactions.php";
if(isset($_POST['money']) && is_numeric($_POST['money'])){
//obteniendo el id del usuario
    $connection = new Connection();
    $currentUser = $connection->getUser($_SESSION['user']);
    $currentUserId = $currentUser['id'];
//añadiendo la transaccion a la base de datos
    $class = 'DEPOSITO';
    $balance = $currentUser['balance'] + $_POST['money'];
    $depositing = $_POST['money'];
    $comment = $_POST['comment'];
    $productId = null;
    $transactions = new Transactions();
    $transactions->addNewDeposit($depositing, $comment, $balance, $currentUserId, $productId);
//sumando el deposito a la cuenta
    $balance = new Balance();
    $balance->deposit($_POST['money']);
    header("location: ../views/bank.php");
}else{
    header("location: ../views/bank.php");
}
?>
