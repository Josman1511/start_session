<?php
session_start();
$_SESSION['msj'] = null;
var_dump($_SESSION);
$users = [
    1 => [
        'usuario' => 'Maillyn',
        'contraseña' => 'mai123' 

    ],
    2 => [
        'usuario' => 'Freddy',
        'contraseña' => 'fred123' 

    ],
];
if(isset($_POST['name']) && isset($_POST['password'])){
    $currentUser = getUser($_POST['name'], $users);
        if(empty($currentUser)){
            $_SESSION['msj'] = "Su usuario no existe";
            header("location: index.php");
        }else{
            var_dump($currentUser);
            if(verifyPassword($_POST['password'], $currentUser['contraseña'])){
                $_SESSION['usuario'] = $currentUser['usuario'];
                header("location: HTML2.php");
            }else{
            $_SESSION['msj'] = "Su contraseña no coincide con el usuario";
            header("location: index.php");
            }    
        }

           
           

        
    }  

function getUser(string $userName, array $users): array{
    $resul = [];
    foreach($users as $user){
        if($userName == $user['usuario']){
            $resul =  $user;
            break;
        }
    }
    return $resul;
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