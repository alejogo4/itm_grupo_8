<?php
    require '../db/clases.php';
    $Email = strtolower($_POST["Email"]);
    $password = strtolower($_POST["password"]);
    $db = new db();
    $result = $db->check_user($Email,$password,true);
    if ($result>0){
        $recordar = false;
        if(isset($_POST['recordar_email'])){
            $recordar = true;
        }
        
        $db->db_ingresar($Email,$password,true,$recordar);        
    }else{
        if($db->check_user($Email," ",false)){
            header("Location: ../login.php?Error=2");
        }else{
            header("Location: ../login.php?Error=1");
        }

    }
?>