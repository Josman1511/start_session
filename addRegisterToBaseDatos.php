<?php
session_start();
require "Connection.php";
$_SESSION["yaExisteThisUser"] = null;
$_SESSION["passwordMax8"] = null;
if (isset($_POST["usernameRegister"]) && isset($_POST["passwordRegister"])) {
    $nameRegis = $_POST["usernameRegister"];
    $passwordRegis = $_POST["passwordRegister"];
    $conexion = new Connection();
    $currentUser = $conexion->getUser($nameRegis);
    if (empty($currentUser)) {
        if (strlen($passwordRegis) > 8) {
            $_SESSION["passwordMax8"] = "La contraseña no puede tener mas de 8 caracteres";
            header("location: registro.php");
        } else {
            $passwordEncrip = password_hash($passwordRegis, PASSWORD_DEFAULT, [cost => 10]);
            $registro = "INSERT INTO usuarios (id, username, password) VALUES ( '0',  '$nameRegis', '$passwordRegis')";
            $conexion->PDO->query($registro);
            header("location: registroExistoso.php");
        }
    }
    else{
            $_SESSION["yaExisteThisUser"] = "Este usuario ya existe";
            header("location: registro.php");
        }
    }


    else {
                header("location: registro.php");
            }


        ?>