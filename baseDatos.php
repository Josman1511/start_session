<?php
session_start();
if(isset($_POST['name']) && isset($_POST['password'])) {
    $currentUser = getUser($_POST["name"]);
}
        var_dump($currentUser);
        /*if(verifyPassword($_POST['password'])){
            $_SESSION['usuario'] = $currentUser['usuario'];
            header("location: HTML2.php");
        }else{
            $_SESSION['msj'] = "Su contraseña no coincide con el usuario";
            header("location: index.php");
        }*/
    //}

//}

function getUser(string $userName){
    $bdd = new PDO( 'mysql:host=127.0.0.1;port=3307;dbname=iniciosesion', 'root', '');
    $resultado = $bdd->query("SELECT * FROM usuarios WHERE username='".  $userName. "'");
    $usuario = $resultado->fetchAll(PDO::FETCH_ASSOC);
    var_dump($usuario);
    if(empty($usuario)){
        $_SESSION['msj'] = "Su usuario no existe";
        }else{

        }
}
function verifyPassword(string $contraseñaEnviada): bool
{
    $bdd = new PDO('mysql:host=127.0.0.1;port=3307;dbname=iniciosesion', 'root', '');
    $resultado = $bdd->query("SELECT * FROM usuarios WHERE password='" . $contraseñaEnviada . "'");
    $contraseñaRegistrada = $resultado->fetchAll(PDO::FETCH_ASSOC);


    if (empty($contraseñaRegistrada)) {

    } else {
        $verifyC = false;
    }
    return $verifyC;
}
    //return $contraseñaEnviada === $contraseaRegistrada;
//}
?>