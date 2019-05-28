<?php
    require '../db/clases.php';
    $Id = strtolower($_GET["Id"]);
    $db = new DB();
    $db->mensaje_contacto($Id);   
    echo"El Id es ".$Id;
?>