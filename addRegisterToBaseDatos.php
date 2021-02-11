<?php
require "Connection.php";

if(isset($_POST["usernameRegister"]) && isset($_POST["passwordRegister"])){
    $nameRegis = $_POST["usernameRegister"];
    $passwordRegis = $_POST["passwordRegister"];
    $conexion = new Connection();
    $currentUser = $conexion->getUser($nameRegis);
    if(empty($currentUser)){
        $registro  = "INSERT INTO usuarios (id, username, password) VALUES ( '0',  '$nameRegis', '$passwordRegis')";
        $conexion->PDO->query($registro);
        header("location: registroExistoso.php");
    }else{

    }


}else{

?>