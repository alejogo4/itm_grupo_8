<?php
    require '../db/clases.php';
    $email = strtolower($_POST["email"]);
    $password = strtolower($_POST["password"]);
    $nombre1 = strtolower($_POST["nombre1"]);
    $nombre2 = strtolower($_POST["nombre2"]);
    $apellido1 = strtolower($_POST["apellido1"]);
    $apellido2 = strtolower($_POST["apellido2"]);
    $db = new db();
    
    if($db->registro_user($email,$password,$nombre1,$nombre2,$apellido1,$apellido2)){
        header("Location: ../login.php?exito=1");
    }
    else{
        header("Location: ../login.php?exito=0");
    }
?>