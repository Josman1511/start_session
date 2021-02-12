<?php
require "Connection.php";
session_start();
$_SESSION['msj'] = null;
var_dump($_SESSION);
if (isset($_POST['name']) && isset($_POST['password'])) {
    $connection = new Connection();
    $currentUser = $connection->getUser($_POST['name']);

    if (empty($currentUser)) {
        $_SESSION['msj'] = "Su usuario no existe";
        header("location: index.php");
    } else {
        if (verifyPassword(password_hash($_POST['password'], PASSWORD_DEFAULT, [cost => 10]), $currentUser["password"])) {
            $_SESSION['usuario'] = $currentUser['username'];
            header("location: HTML2.php");
        } else {
            $_SESSION['msj'] = "Su contraseña no coincide con el usuario";
            header("location: index.php");
        }
    }


}
function verifyPassword(string $contraseñaEnviada, string $contraseaRegistrada): bool
{
    /*
    if($contraseñaEnviada === $contraseaRegistrada){
        $verifyC = true;
    }else {
        $verifyC = false;
    }
    return $verifyC;
    */
    return $contraseñaEnviada === $contraseaRegistrada;
}

?>