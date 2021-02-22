<?php
session_start();
require "../models/Connection.php";
$_SESSION["error"] = null;
if (isset($_POST["usernameRegister"], $_POST["passwordRegister"])) {
    $nameRegis = $_POST["usernameRegister"];
    $passwordRegis = $_POST["passwordRegister"];
    $conexion = new Connection();
    $currentUser = $conexion->getUser($nameRegis);
    if (empty($currentUser)) {
        if (strlen($passwordRegis) < 4) {
            $_SESSION["error"] = "La contraseña no puede tener menos de 4 caracteres";
            header("location: ../views/registro.php");
        } else {
            $passwordEncrip = password_hash($passwordRegis, PASSWORD_DEFAULT, [cost => 5]);
            $registro = "INSERT INTO usuarios (id, username, password) VALUES ( '0',  '$nameRegis','$passwordEncrip')";
            $conexion->getPDO()->query($registro);
            header("location: ../views/registroExistoso.php");
        }
    } else {
        $_SESSION["error"] = "Este usuario ya existe";
        header("location: ../views/registro.php");
    }
} else {
    header("location: ../views/registro.php");
}


?>