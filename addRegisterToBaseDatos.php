<?php
require "Connection.php";
if(isset($_POST["usernameRegister"]) && isset($_POST["passwordRegister"])){
    $nameRegis = $_POST["usernameRegister"];
    $passwordRegis = $_POST["passwordRegister"];
    $registro  = "INSERT INTO usuarios (id, username, password) VALUES ( '0',  '$nameRegis', '$passwordRegis')";
    $conexion = new Connection();
    $conexion->PDO->query($registro);
    header("location: index.php");
}else{
    echo "no";
}

?>