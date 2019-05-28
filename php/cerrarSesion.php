<?php
session_start();
require('../clases/seguridad.php');
require('../db/clases.php');
$db=new db();
$seguridad = new db();
if($db->changeAccess(0,$_SESSION["email"])){
    $seguridad->cerrarSesion();
}



?>