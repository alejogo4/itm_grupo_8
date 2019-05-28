<?php
    require '../db/clases.php';
    $email = strtolower($_POST["email"]);
    $nombre1 = strtolower($_POST["nombre1"]);
    $nombre2 = strtolower($_POST["nombre2"]);
    $apellido1 = strtolower($_POST["apellido1"]);
    $apellido2 = strtolower($_POST["apellido2"]);
    $ciudad = strtolower($_POST["ciudad"]);
    $asunto = strtolower($_POST["asunto"]);
    $mensaje = strtolower($_POST["mensaje"]);

    $db = new DB();

  
    if($db->registro_contacto($email,$nombre1,$nombre2,$apellido1,$apellido2,$ciudad,$asunto,$mensaje)){
         header("Location: ../index.php?exito=1");
    }
   


?>