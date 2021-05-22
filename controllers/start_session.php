<?php
require "../models/Connection.php";
session_start();
$_SESSION['msj'] = null;
var_dump($_SESSION);
if (isset($_POST['name']) && isset($_POST['password'])) {
    $connection = new Connection();
    $currentUser = $connection->getUser($_POST['name']);

    if (empty($currentUser)) {
        $_SESSION['msj'] = "Su usuario o contraseña son incorrectos";
        header("location: ../index.php");
    } else {
        if (verifyPassword($_POST['password'], $currentUser["password"])) {
            $_SESSION['user'] = $currentUser['username'];
            $_SESSION['id'] = $currentUser['id'];
            header("location: ../views/home.php");
        } else {
            $_SESSION['msj'] = "Su usuario o contraseña son incorrectos";
            header("location: ../index.php");
        }
    }


}
function verifyPassword(string $passwordSent, string $passwordRegistered): bool
{

    if(password_verify($passwordSent, $passwordRegistered)){
        $verifyC = true;
    }else {
        $verifyC = false;
    }
    return $verifyC;
}

?>