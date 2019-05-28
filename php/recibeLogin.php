<?php
    require '../db/clases.php';
    $Email = strtolower($_POST["Email"]);
    $password = strtolower($_POST["password"]);
    $db = new DB();
    $result = $db->check_user($Email,$password,true);
    if ($result>0){
        $db->inicioSesion($Email,$password);
        
        
    }else{
        if($db->check_user($Email, " ",false)){
            header("Location: ../login.php?Error=2");
        }else{
            header("Location: ../login.php?Error=1");
        }

    }
?>