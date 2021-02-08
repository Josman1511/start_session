<?php 
require_once("Person.php");
session_start();
$person1 = new Person($_SESSION['usuario'], $_POST['edad']);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
        .saludo{
            font-family: sans-serif;
            font-size: 900%;
            text-align: center;
        }
        .diseño_input{
            font-family: sans-serif;
            font-size: 250%;
            
        }
    </style>
</head>
<body>
    <h1 class="saludo"><?= $person1->speak() ?? ""?></h1>
    <form action="HTML2.php" method="post">
    <input class="diseño_input" type="submit" value="Ir atras">
    </form>
</body>
</html>
