<?php

class seguridad{
    private $email;
    private $pass;
   

    function logueo_sesiones($email,$password){
        session_start();
        $_SESSION["email"] = $email;
        $_SESSION["password"] = $password;
        header("Location: ../index.php?login=1&email=".$email); //Borrar get variables
    }

}

?>