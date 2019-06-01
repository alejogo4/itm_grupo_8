<?php
    require '../db/clases.php';
    $Email = strtolower($_POST["Email"]);
    $db = new db();

    if(isset($_POST["ingresar"])){
        
        $password = strtolower($_POST["password"]);
        
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

    }else if(isset($_POST["olvidar"])){
        $_SESSION["recordar"] = "1";
        if($db->ReestablecerContrasena($Email)){
            header("Location: ../login.php?NewPass=1");
        }else{
            header("Location: ../login.php?NewPass=0");
        }
    }
?>