<?php
    session_start();
    require('../db/clases.php');
    $db=new db();

    if($db->changeAccess(0,$_SESSION["email"])){
        $db->cerrarSesion();
    }
?>