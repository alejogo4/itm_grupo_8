<?php
    require '../db/clases.php';
    $Email = $_POST["Email"];
    $db = new db();

    if($db->ReestablecerContrasena($Email)){
        header("Location: ../login.php?NewPass=1");
    }else{
        header("Location: ../login.php?NewPass=0");
    }

?>