<?php

class seguridad{
 

    function logueo_sesiones($email,$password){
        //para crear todas las variables de sesión relacionadas al logueo
        session_start();
        $_SESSION["email"] = $email;
        $_SESSION["password"] = $password;
    }


    function logueo_autorizado(){
        //para validar el logueo y acceso autorizado a páginas 
    }

    function inactividad(){
        //validar la inactividad del usuario
        session_start();
        if (!isset($_SESSION['tiempo'])) {
            $_SESSION['tiempo']=time();
        }
        else if (time() - $_SESSION['tiempo'] > 200) { //Inactividad de 2 segundos
            session_destroy();
            header("Location: index.php");
            die();  
        }
        $_SESSION['tiempo']=time(); //Si hay actividad seteamos el valor al tiempo actual
    }




    function salir(){
        //para cerrar la sesión de usuario cuando sea necesario 
    }


    function pass_aleatorio(){
        $cadena  ="012345679aAbBcCdDeEfFgGhHiIjJkKlLmMnNoOpPqQrRsStTuUvVwWhHyYzZ,;._-";
        $valorAleatorio = substr($cadena, count($cadena));
        $pass_temp = substr(str_shuffle($valorAleatorio),-6);
        return $pass_temp;

    }


    function cookies_visitas(){
        if(isset($_COOKIE['count'])){
            setcookie('count', ++$_COOKIE['count']);
        }else{
            setcookie('count',1);
        }
        
        return $_COOKIE['count'];

    }


    function cookies_logueo($email){
        //cookies relacionadas a la funcionalidad de 'recordar usuario' 
        if(!isset($_COOKIE['recordar_usuario']) || $_COOKIE['recordar_usuario'] != $email){
            setcookie('recordar_usuario',$email,time()+691200,"/");
        }

    }

}

?>