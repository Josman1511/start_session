<?php
$bdd = new PDO( 'mysql:host=127.0.0.1;port=3306;dbname=my_data', 'root', '');
$respuesta = $bdd->prepare("select * from usuarios");
$respuesta->execute();
$usuarios = [];
foreach($respuesta as $res){
    $usuarios[]=$res;
}
var_dump(json_encode($usuarios));
require_once('index.php');
?>