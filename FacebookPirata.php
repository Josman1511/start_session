<?php
require "Connection.php";
session_start();
$_SESSION['msj'] = null;
var_dump($_SESSION);
if(isset($_POST['name']) && isset($_POST['password'])){
    $currentUser = getUser($_POST['name']);

        if(empty($currentUser)){
            $_SESSION['msj'] = "Su usuario no existe";
            header("location: index.php");
        }else{
            if(verifyPassword($_POST['password'], $currentUser["password"])){
               $_SESSION['usuario'] = $currentUser['username'];
                header("location: HTML2.php");
            }else{
            $_SESSION['msj'] = "Su contraseña no coincide con el usuario";
            header("location: index.php");
            }    
        }

    }  

function getUser(string $userName): array{
    $connection = new Connection();
    $query = $connection->PDO->query("SELECT * FROM usuarios WHERE username='".  $userName. "'");
    $usuario = $query->fetchAll(PDO::FETCH_ASSOC);
    new Connection($userName);

    return (empty($usuario)) ? $usuario : $usuario[0];
}
function verifyPassword(string $contraseñaEnviada, string $contraseaRegistrada): bool {
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