<?php
    require '../db/clases.php';
    $currentPassword = $_POST["currentPassword"];
    $newPassword =$_POST["newPassword"];

    $db = new db();

    if($db->changePassword($currentPassword,$newPassword)){
        header("Location: ../index.php?pass=1");
    }else{
        header("Location: ../index.php?pass=0");
    }

?>