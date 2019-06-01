<?php

require '../db/clases.php';
$email = strtolower($_GET["email"]);

$db = new db();
if($db->changeStatus($email)){
    header("Location: ../index.php");
}




?>