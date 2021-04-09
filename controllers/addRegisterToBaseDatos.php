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
            $consulta = "INSERT INTO usuarios (username, password) VALUES (:username, :password)";
            $registro = $conexion->getPDO()->prepare($consulta);
            $registro->bindParam('username', $nameRegis);
            $registro->bindParam('password', $passwordEncrip);
            $registro->execute();
            header("location: ../views/registroExistoso.php");
        }
    } else {
        $_SESSION["error"] = "Este usuario ya existe";
        header("location: ../views/registro2.php");
    }
} else {
    header("location: ../views/registro2.php");
}
?>