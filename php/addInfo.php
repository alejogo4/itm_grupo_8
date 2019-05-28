<?php

    require '../db/clases.php';
    $age = $_POST["age"];
    $gender =$_POST["gender"];
    $job =$_POST["job"];
    $db = new DB();

    if($db->addInfo($age,$gender ,$job)){
        header("Location: ../index.php?info=1");
    }else{
       header("Location: ../index.php?info=0");
    }

?>