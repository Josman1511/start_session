<?php
require "../views/deposito.php";
require "../models/Saldo.php";
if(isset($_POST['dinero']) && is_numeric($_POST['dinero'])){
    $deposito = new Saldo();
    $deposito->deposito($_POST['dinero']);
    header("location: ../views/banco.php");
}else{
    header("location: ../views/banco.php");
}
?>
