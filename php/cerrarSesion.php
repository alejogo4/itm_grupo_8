<?php
session_start();
//require('../db/seguridad.php');
require('../db/clases.php');
$db=new db();
//$seguridad = new db();
if($db->changeAccess(0,$_SESSION["email"])){
    $db->cerrarSesion();
}



    if($db->changeAccess(0,$_SESSION["email"])){
        $db->cerrarSesion();
    }
?>